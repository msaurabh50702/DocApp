
<?php
/* Database connection settings */
//session_start();
$errors   = array();
$db = mysqli_connect('localhost', 'root', '', 'docapp');
//mysqli_connect("localhost","my_user","my_password","my_db");

if($db == false)
{
    echo "database is not connected";
    
}
?>