<?php
include("User.php");

$servername = "localhost";
$username = "uni_db_admins";
$password = "??@admins??";
$dbname = "uni_registeration_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
    // echo(
    //     "<script>
    //         alert('Connection successful to Database');
    //     </script>"
    // );
}


function addUserToDb(User $newUser):int{

    global $conn;
    
    $sql = "INSERT INTO users (full_name, user_name, phone, whatsapp_number, address, email, password, user_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $hashed_password = password_hash($newUser->getPassword(),PASSWORD_DEFAULT);
    $stmt->bind_param("ssssssss", $newUser->full_name,$newUser->user_name, 
        $newUser->phone, $newUser->whatsapp_number, $newUser->address, $newUser->email, $hashed_password, $newUser->user_image);
    return $stmt->execute();
}






?>