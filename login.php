<?php
$user = $_POST["username"];
$pwd = $_POST["password"];
$hashed_pwd = hash("sha256", "$pwd");

$conn = new mysqli("reccheckdb.ctrhgcjnjceq.us-east-1.rds.amazonaws.com", "team17", "mIqmpqkB4McGexJiD7lV","reccheck");
if(!$conn->ping()){
    echo "Error connecting to db";
}

$result = $conn->query("SELECT * FROM members WHERE username = '$user'");
if($result->num_rows == 1){
    $row = $result->fetch_row();
    $first_name = $row[1];
    $stored_pwd = $row[4];
    
    if($stored_pwd == $hashed_pwd){
        echo "Welcome $first_name";
    }
    else{
        echo "Incorrect password";
    }
}
else{
    echo "Username does not exist";
}
?>