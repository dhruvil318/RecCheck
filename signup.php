<?php
$fname = $_POST["firstName"];
$lname = $_POST["lastName"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$user = $_POST["username"];
$pwd = $_POST["password"];
$hashed_pwd = hash("sha256", "$pwd");

$conn = new mysqli("reccheckdb.ctrhgcjnjceq.us-east-1.rds.amazonaws.com", "team17", "mIqmpqkB4McGexJiD7lV","reccheck");
if(!$conn->ping()){
    echo "Error connecting to database";
}

$duplicate_users = $conn->query("SELECT * FROM members where username = '$user';");
if($duplicate_users->num_rows == 0){
    $result = $conn->query("INSERT INTO members (first_name, last_name, username, password, phone, email) VALUES ('$fname', '$lname', '$user', '$hashed_pwd', '$phone', '$email')");
    if($conn->affected_rows == 1){
        echo "Succesfully added new user";
    }
}
else{
    echo "Username already taken";
}
?>