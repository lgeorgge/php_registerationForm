<?php

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






?>