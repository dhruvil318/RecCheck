import smtplib
import sys
from email.message import EmailMessage


def email_alert(body, to):
    msg = EmailMessage()
    msg.set_content(body)
    msg['to'] = to

    user = "emailaddress@gmail.com"
    msg['from'] = user
    password = "API_key"

    text = smtplib.SMTP("smtp.gmail.com", 587)
    text.starttls()
    text.login(user, password)
    text.send_message(msg)

    text.quit()


if __name__ == "__main__":
    email_alert("Hello world", "phonenumber@vtext.com")
