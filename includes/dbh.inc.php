<?php 
$servername="localhost";
$dBusername="root";
$dBpassword="";
$dBname="user_account";

$conn = new mysqli ($servername, $dBusername, $dBpassword, $dBname);
if ($conn->connect_error){
    die ('Connection Failed : ' .$conn->connect_error);
}