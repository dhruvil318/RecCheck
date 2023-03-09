function sendEmail() {
  Email.send({
    SecureToken : "dd3121de-ce79-47d9-924d-e9e0022cf6a2",
    To : 'kwongchong8888@gmail.com',
    From : "jmanquachcoder@gmail.com",
    Subject : "RecCheck Alert",
    Body : "Customer Needs Help At Front Desk!"
}).then(
    message => alert(message)
  );
};