from .DBconnector import DBconnector as db

class Item:
    def __init__(self, id=None, item_name=None, price=None, description=None) -> None:
        self.id = id
        self.item_name = item_name
        self.price = price
        self.description = description
        self.db = db()

    def getAllItem(self) -> list:
        return self.db.fetch('SELECT * FROM menu')
    
    def getItemByName(self, item_name) -> None:
        record = self.db.fetch("SELECT * FROM menu WHERE item_name = %s", [item_name])
        if record:
            self.id = record[0][0]
            self.item_name = record[0][1]
            self.price = record[0][2]
            self.description = record[0][3]

    def getItemInfor(self) -> dict:
        return {
            'id': self.id,
            'item_name': self.item_name,
            'price': self.price,
            'description': self.description
            }
        
