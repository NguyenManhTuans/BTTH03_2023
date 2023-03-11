<?php

use PSpell\Config;

    include("Utils/EmailSender.php");
    include("Utils/EmailServerInterface.php");
    include("Utils/MyEmailServer.php");
    include("config.php");
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code= '';
    for ($i = 0; $i < 40; $i++) {
        $code .= $characters[rand(0, strlen($characters)-1)];
    }




if(isset( $_POST['send'])){
$emailServer = new MyEmailServer();
$emailSender = new EmailSender($emailServer);
$emailSender->send($_POST['email'], "Xac thuc Email", $code);


$db_host = 'localhost';
$db_name = 'btth03_2023';
$db_user = 'root';
$db_pass = '';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = mysqli_connect('localhost', 'root', '', 'btth03_2023');
$email = $_POST['email'];
$password=$_POST['pass'];
$query = "INSERT INTO users(email ,password	,activation,status) VALUES ('$email','$password', '$code',0)";

if(mysqli_query($conn,$query)){
   echo "TRue";
 }
 else echo "Loi";
}

?>