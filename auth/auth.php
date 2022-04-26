<?php
require('../config/db.php');
// var_dump($_POST);

if(isset($_POST['register'])){
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$profile = $_FILES['profile']['name'];

    // echo "check"."<br>";
    // echo(var_dump($first."<br>".$last."<br>",$email."<br>",$pass."<br>",$cpass."<br>",$profile));
    // echo ($_POST));
    // echo(printf($_POST));

    $type = null;
    $msg = null;

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is a valid email address");
    } else {
        echo("$email is not a valid email address");
        $type = "error";
        $msg = "Invalid Email";
    }
 
}

?>