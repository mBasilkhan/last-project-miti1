<?php
session_start();
?>
<html>
<body>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
</script>
<script src="//code.jquery.com/jquery-1.11.1.min.js">
</script>
<!------ Include the above in your HEAD tag ---------->


<link href="style.css" rel="stylesheet">

<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">


	<form class="form-signin" method="POST">
		<h1 class="form-signin-heading text-muted">Sign In</h1>

		<input type="text" class="form-control" placeholder="Email address" required="" autofocus="" name="Name">
	
	<input type="password" class="form-control" placeholder="Password" required="" name="pass">
	
	<button class="btn btn-lg btn-primary btn-block" type="submit">

			Sign In
		</button>
	</form>

</div>

<?php
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
    $webUser = $_REQUEST["Name"];
    $webPass = $_REQUEST["pass"];
    $sql = "Select * from student where Name='".$webUser."'  and Password='".$webPass."' ";
   
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $_SESSION["user"] = $row["Name"];
            $_SESSION["id"] = $row["ID"];
            $_SESSION["password"] = $row["Password"];
            header('Location: http://localhost/folder/index1.php');
        }
    }
    $conn->close();
}
?>


<body>
</html>


