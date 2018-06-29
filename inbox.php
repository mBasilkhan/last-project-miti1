<?php
$a=$_GET["t1"];
$host = "localhost";
   $user = "root";
   $pass = "";
   $db = "basil";
   $conn = new mysqli($host,$user,$pass,$db);
   // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "Select * from posts where fto='$a'";

?>
<h4 align=right> <?php echo "Welcome ".$a ?></h4>
<div align=right><a href="inbox.php?t1=<?php echo $a?>">Inbox</a></div>
<table border=1 align=center>
<tr><th>S.No</th><th>From</th><th>Message</th></tr>
<?php
    $result = $conn->query($sql);

    if($result->num_rows > 0){
$s=1;        
while($row = $result->fetch_assoc()){
            $b=$row["ffrom"];
	$c=$row["post"];
?>
<tr><td><?php echo $s ?></td><td><?php echo $b ?></td><td><?php echo $c ?></td></tr>


<?php
      $s++;      
        }
    }
    $conn->close();
?>