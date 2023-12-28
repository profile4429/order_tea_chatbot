from .DBconnector import DBconnector as db

class Receipt:
    def __init__(self, id_receipt=-1, id_user=None, id_item=None, address=None, create_at=None, quantity=None, sum=None, description=None, status=1, payment_option=1) -> None:
        self.id_receipt = id_receipt
        self.id_user = id_user
        self.id_item = id_item
        self.address = address
        self.create_at = create_at
        self.quantity = quantity
        self.sum = sum
        self.description = description
        self.status = status
        self.payment_option = payment_option
        self.db = db()

    def addReceipt(self):
        values = [
            self.id_user,
            self.id_item,
            self.address,
            self.create_at,
            self.quantity,
            self.sum,
            self.description,
            self.status,
            self.payment_option,
        ]
        self.db.insert(
            'INSERT INTO receipt(id_user, id_item, address, create_at, quantity, sum, description, status, payment_option) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)',
            values
        )
        self.id_receipt = self.db.cursor.lastrowid
        return self
