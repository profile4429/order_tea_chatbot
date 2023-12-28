# This files contains your custom actions which can be used to run
# custom Python code.
#
# See this guide on how to implement these action:
# https://rasa.com/docs/rasa/custom-actions


# This is a simple example for a custom action which utters "Hello World!"

from typing import Any, Text, Dict, List

from rasa_sdk import Action, Tracker, FormValidationAction
from rasa_sdk.events import EventType, SlotSet, AllSlotsReset
from rasa_sdk.executor import CollectingDispatcher
from rasa_sdk.types import DomainDict

from .w2n import toNum

from .Model.Item import Item
from .Model.user import User
from .Model.receipt import Receipt

import re

import datetime



class action_return_menu(Action):

    def name(self) -> Text:
        return "action_return_menu"
    
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        
        record = Item().getAllItem()
        
        menu = ''''''
        k = 0
        for i in record:
            k+=1
            menu = menu + str(k) + '. ' + str(i[1]) + ': ' + str(i[2]) + '\n'

        dispatcher.utter_message(text=menu)

        return []


ALLOWED_TEA_SIZES = ["M", "L"]



# validator tea form
class ValidateTeaForm(FormValidationAction):
    def name(self) -> Text:
        return "validate_tea_form"
    
    def validate_tea_type(
        self,
        slot_value: Any,
        dispatcher: CollectingDispatcher,
        tracker: Tracker,
        domain: DomainDict,
    ) -> Dict[Text, Any]:
        """Validate `tea_type` value."""
            
        menu = Item().getAllItem()
        ALLOWED_TEA_TYPES = []
        for i in menu:
            ALLOWED_TEA_TYPES.append(i[1])

        if slot_value.lower() not in ALLOWED_TEA_TYPES:
            dispatcher.utter_message(text=f"Xin lỗi quý khách, quán mình chưa phục vụ {slot_value} ạ")
            return {"tea_type": None}
        dispatcher.utter_message(text=f"Xác nhận bạn muốn dùng {slot_value}.")
        return {"tea_type": slot_value}
    
    def validate_tea_size(
        self,
        slot_value: Any,
        dispatcher: CollectingDispatcher,
        tracker: Tracker,
        domain: DomainDict,
    ) -> Dict[Text, Any]:
        """Validate `tea_size` value."""

        slot_value = slot_value.upper()

        if slot_value not in ALLOWED_TEA_SIZES:
            dispatcher.utter_message(text=f"Chúng mình chỉ có size M và size L thôi ạ.")
            return {"tea_size": None}
        dispatcher.utter_message(text=f"Xác nhận bạn muốn size {slot_value}.")
        return {"tea_size": slot_value}
    
    def validate_tea_quan(
        self,
        slot_value: Any,
        dispatcher: CollectingDispatcher,
        tracker: Tracker,
        domain: DomainDict,
    ) -> Dict[Text, Any]:
        """Validate `tea_quan` value."""
         
        slot_value = toNum(slot_value)

        if int(slot_value) < 1 or int(slot_value) > 99:
            dispatcher.utter_message(text=f"Rất xin lỗi quý khách chúng mình chỉ có thế phục vụ tối thiểu là 1 và tối đa là 99 ly thôi ạ")
            return {"tea_quan": None}
        dispatcher.utter_message(text=f"Xác nhận bạn muốn số lượng là {slot_value}.")
        return {"tea_quan": slot_value}








# validator information form

class ValidateInforForm(FormValidationAction):
    def name(self) -> Text:
        return "validate_infor_form"
    
    def validate_phone(
        self,
        slot_value: Any,
        dispatcher: CollectingDispatcher,
        tracker: Tracker,
        domain: DomainDict,
    ) -> Dict[Text, Any]:
        """Validate `phone` value."""

        Regex = '^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$'

        if not re.match(Regex, slot_value):
            dispatcher.utter_message(text=f"Số điện thoại không hợp lệ. Quý khách vui lòng nhập lại ạ")
            return {"phone": None}
        dispatcher.utter_message(text=f"Xác nhận số điện thoại của bạn {slot_value}.")
        user = User()
        user.searchUserByPhone(slot_value)
        name = user.getUserInfor()['name']
        if name :
            dispatcher.utter_message(text=f"Xin chào {name}. Chào mừng quay trở lại")
            return {"phone": slot_value, "user_name": name}
        return {"phone": slot_value}
    
    def validate_user_name(
        self,
        slot_value: Any,
        dispatcher: CollectingDispatcher,
        tracker: Tracker,
        domain: DomainDict,
    ) -> Dict[Text, Any]:
        """Validate `user_name` value."""

        if len(slot_value) < 1 :
            dispatcher.utter_message(text=f"Tên không hợp lệ. Quý khách vui lòng nhập lại")
            return {"user_name": None}
        dispatcher.utter_message(text=f"Xin chào {slot_value}.")
        return {"user_name": slot_value}
    
    def validate_street(
        self,
        slot_value: Any,
        dispatcher: CollectingDispatcher,
        tracker: Tracker,
        domain: DomainDict,
    ) -> Dict[Text, Any]:
        """Validate `street` value."""
         
        house_num = tracker.get_slot('house_num') + ' ' if tracker.get_slot('house_num') else '' 
        department = tracker.get_slot('department') + ' ' if tracker.get_slot('department') else ''
        street = tracker.get_slot('street') + ' ' if tracker.get_slot('street') else ''
        ward = tracker.get_slot('ward') + ' ' if tracker.get_slot('ward') else ''
        district = tracker.get_slot('district') + ' ' if tracker.get_slot('district') else ''

        address = house_num + department + street + ward + district


        if len(slot_value) < 1 :
            dispatcher.utter_message(text=f"Địa chỉ không hợp lệ. Quý khách vui lòng nhập lại")
            return {"street": None, "address": None}
        dispatcher.utter_message(text=f"Xác nhận địa chỉ: {address}.")
        return {"street": slot_value ,"address": address}






# answer ask price question

class action_return_tea_price(Action):

    def name(self) -> Text:
        return "action_return_tea_price"
    
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        
        tea_type = 'loại trà quý khách vừa yêu cầu'
        if tracker.get_slot("price_tea_type"):
            tea_type = tracker.get_slot("price_tea_type").lower()
        else:
            if tracker.get_slot("inquired_tea_type"):
                tea_type = tracker.get_slot("inquired_tea_type").lower()

        tea = Item()
        tea.getItemByName(tea_type)
        price = tea.getItemInfor()['price']

        if price:
            dispatcher.utter_message(text=f"{tea_type} đang được bán với giá là {str(price)}")
            return []
        else:
            dispatcher.utter_message(text=f"Xin lỗi quý khách, quán mình chưa phục vụ {tea_type} ạ")
            return []
        

# answer if tea type in menu

class action_inquired_tea_type(Action):

    def name(self) -> Text:
        return "action_inquired_tea_type"
    
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        
        tea_type = tracker.get_slot("inquired_tea_type").lower() if tracker.get_slot("inquired_tea_type") else 'loại trà quý khách vừa yêu cầu'

        menu = Item().getAllItem()
        ALLOWED_TEA_TYPES = []
        for i in menu:
            ALLOWED_TEA_TYPES.append(i[1])

        if tea_type in ALLOWED_TEA_TYPES:
            dispatcher.utter_message(text=f"dạ quán mình có {tea_type} ạ")
            return []
        else:
            dispatcher.utter_message(text=f"Xin lỗi quý khách, quán mình chưa phục vụ {tea_type} ạ")
            return []

 # answer invoice
        
class Action_return_invoice(Action):

    def name(self) -> Text:
        return "action_return_invoice"
    
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        
        invoice = f'''
       ***
Thông tin đơn hàng
    Tên: {tracker.get_slot('user_name')}
    Sđt: {tracker.get_slot('phone')}
    Địa chỉ: {tracker.get_slot('address')}
***
    Loại: {tracker.get_slot('tea_type')}
    Size: {tracker.get_slot('tea_size').upper()}
    Số lượng: {int(toNum(tracker.get_slot('tea_quan')))}
***
    Thành tiền: {total(tracker.get_slot('tea_type'), tracker.get_slot('tea_quan'))}
'''
        dispatcher.utter_message(text= invoice)

        return []
    
class ActionSubmitInvoice(Action):

    def name(self) -> Text:
        return "action_submit_invoice"
    
    def run(self, dispacher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        
        user = User()
        user.searchUserByPhone(tracker.get_slot('phone'))
        if not user.getUserInfor()['name']:
            user = User(name = tracker.get_slot('user_name'), phone=tracker.get_slot('phone'))
            user.addUser()
        user = user.getUserInfor()
        tea = Item()
        tea.getItemByName(tracker.get_slot('tea_type'))
        tea = tea.getItemInfor()
        sum = tea['price'] * int(toNum(tracker.get_slot('tea_quan')))
        tea_quan = int(toNum(tracker.get_slot('tea_quan')))
        now = datetime.datetime.now()
        receipt = Receipt(id_user=user['id'], id_item=tea['id'], address=tracker.get_slot('address'),
                          create_at=now, quantity=tea_quan, sum=sum, status=1, payment_option=1)
        receipt.addReceipt()
        dispacher.utter_message(text='Ghi nhận đơn hàng thành công')
        return [AllSlotsReset()]
    
class ActionCancelInvoice(Action):

    def name(self) -> Text:
        return "action_cancel_invoice"
    
    def run(self, dispacher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        dispacher.utter_message(text='Xác nhận hủy đơn')
        return [AllSlotsReset()]
        
def total(tea_type, tea_quan) -> str:
    tea = Item()
    tea.getItemByName(tea_type)
    tea_price = tea.getItemInfor()['price']
    tea_quan = int(toNum(tea_quan))
    total = tea_quan * tea_price
    str_total = str(total)
    pos = 3
    while(pos < len(str_total)) :
        str_total = str_total[:-pos] + '.' + str_total[-pos:]
        pos += 4
    return str_total
