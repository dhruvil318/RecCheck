import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    username="*",
    password="*",
    database="reccheck"
)


def login(user, pwd):
    cursor = db.cursor()
    # need to check for sql injections here
    cursor.execute(f"SELECT * FROM members WHERE username = '{user}';")
    result = cursor.fetchone()
    if result is None:
        return False
    storedpwd = result[4]
    return storedpwd == pwd


def signup(fname, lname, user, pwd, phone, email):
    # checks if new username is unique
    if not verifyUsername(user):
        return "Invalid"

    cursor = db.cursor()
    # need to check for sql injections here
    cursor.execute(
        f"INSERT INTO members (first_name, last_name, username, password, phone, email) VALUES ('{fname}', '{lname}', '{user}', '{pwd}', '{phone}', '{email}');")
    db.commit()

    result = cursor.rowcount
    if result == 1:
        return "Success"
    else:
        return "Error"


def verifyUsername(username):
    cursor = db.cursor()
    cursor.execute(
        f"SELECT * FROM members where username = '{username}';")

    result = cursor.fetchall()
    return cursor.rowcount == 0


signup('fname', 'lname', 'user', 'pwd',
       'phonenumber', 'emailaddr')
