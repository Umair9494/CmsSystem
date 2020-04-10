<?php
if(isset($_POST['submit']))
{
    $arr = array("Umair","javed", "Umar", "Usman","Huzaifa");
    $username = $_POST['user'];
    $password = $_POST['password'];
//    $min = 5;
//    $max = 10;
//    if (strlen($username < $min))
//    {
//        echo 'Username is very short kindly enter minimum 5 characters';
//    }
//    if(strlen($username > $max)){
//        echo 'Username is very long kindly enter maximum 10 characters';
//    }

    if(!in_array($username , $arr)){
        echo 'You are not allowed Man!';
    }
    else
    {
        echo 'Welcome';
    }
}
?>