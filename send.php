<?php
$a=$_POST["t2"];
$b=$_POST["c1"];
$c=$_POST["t1"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "basil";
   $conn = new mysqli($host,$user,$pass,$db);
   // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "insert into posts values('$a','$b','$c')";
   
    $result = $conn->query($sql);
    
    echo "Message sent";

    $conn->close();
}
?>