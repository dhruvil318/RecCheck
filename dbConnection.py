import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    username="*****",
    password="*****",
    database="reccheck"
)


def login(user, pwd):
    cursor = db.cursor()
    # check for sql injections
    cursor.execute(f"SELECT * FROM members WHERE username = '{user}';")
    result = cursor.fetchone()
    if result is None:
        return False
    storedpwd = result[4]
    return storedpwd == pwd


print(login("username", "password"))
