from .DBconnector import DBconnector as db

class User:
    def __init__(self, id=-1, name=None, phone=None, note=None) -> None:
        self.id = id
        self.name = name
        self.phone = phone
        self.note = note
        self.db = db()

    def addUser(self):
        values = [
            self.name,
            self.phone,
            self.note
        ]
        self.db.insert("INSERT INTO user(name, phone, note) VALUES( %s, %s, %s)", values)
        self.id = self.db.cursor.lastrowid
        return self
    
    def searchUserByPhone(self, phone): 
        record = self.db.fetch("SELECT * FROM user WHERE phone = %s", [phone])
        if record :
            self.id, self.name, self.phone, self.note = record[0] 

    def getUserInfor(self) -> dict:
        return {
            'id': self.id,
            'name': self.name,
            'phone': self.phone,
            'note': self.note
        }
