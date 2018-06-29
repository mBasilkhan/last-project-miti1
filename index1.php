<?php
session_start();
if(!$_SESSION["user"]){
  header('location: http://localhost/folder');
$uname=$_SESSION["user"];
}
$uname=$_SESSION["user"];
$host = "localhost";
   $user = "root";
   $pass = "";
   $db = "basil";
   $conn = new mysqli($host,$user,$pass,$db);
   // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "Select Name from student where not Name='$uname'";

?>

<a href="logout.php">LOGOUT</a>

<h4 align=right> <?php echo "Welcome ".$uname ?></h4>
<div align=right><a href="inbox.php?t1=<?php echo $uname?>">Inbox</a></div>
<form action="send.php" method="post">
<table border=1 align=center>




<tr><td><select name=c1> 
<?php
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $a=$row["Name"];
?>
<option><?php echo $a ?></option>
<?php
            
        }
    }
    $conn->close();
?>
</td></tr>
<tr><td>
<textarea cols=50 rows=10 name=t1></textarea>
<input type=hidden value=<?php echo $uname ?> name=t2>
</td></tr>
<tr><td align=right>
<input type=submit value="send">
</td></tr>
</table>
</form>


