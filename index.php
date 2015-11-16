<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <p>Username: <input type="text" name="uname"></p>
  <p>Password: <input type="password" name="pname"></p>
  <input type="submit" value="Login in">
</form>
<button><a id = "new_account" href = "create_user.php">Create new account</a></button>
 <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Render information
        $name = $_POST['uname'];
        $password = $_POST['pname'];
        if(empty($name) || empty($password)) {
            echo "Missing infromation";
        } else {
           // Create connection 
		   $conn = new mysqli("localhost", "XXXX", "XXXXXX", "XXXXXX");
		   
		   // Check connection
		   if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		   }
		   //echo "Connected successfully"."<br>";
		   $sql = "SELECT username, passcode FROM users where username = '$name' and passcode = '$password'";
		   $result = $conn->query($sql);
		 
		   if(empty($result->fetch_assoc())) {
				echo "Don't exist in the database"."<br>";
		   } else {
				header("Location: profile.php?username=$name");
		   }
		   
        }
    } 
 ?>


</body>
</html>