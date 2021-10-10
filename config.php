<?php
$server='localhost';

$user='root';

$pass='';

$db='contacts_app';

$conn = new mysqli($server,$user,$pass,$db);

if($conn->connect_error)
{
     die("connection not done".$conn->connect_error);
    
}
include('components/validation.php');

session_start();


?>