<h3>Sign Up</h3>
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>" >
	<p>Name: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type = "text" name = "name"/></p>
	<p>Enter Username: <input type="text" name="username"/></p>
    <p>Enter Password:  <input type="password" name="password1"/></p>
    <p>Re-enter Password: <input type="password" name="password2"/></p>
    <input type="submit" value="Submit"/>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Render information
		$name = $_POST['name'];
        $user= $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
		
        if ($password1 != $password2) {
            echo "Passwords mismatch";
        }
        else {
            // Create connection
			$conn = new mysqli("localhost","XXX", "XXXXXX", "XXXXX");

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			//echo "Connected successfully"."<br>";
			$present = "SELECT username FROM users WHERE username = '$user'";
			$result = $conn->query($present);
			if(empty($result->fetch_assoc())) {
				$sql = "INSERT INTO users (username, passcode, name) VALUES ('$username', '$password1', '$name')";
				//Create dafult JPG and get the JPG image and place that in images table
				
				//Create image
				$image = imagecreatetruecolor(950, 400);
				$white = imagecolorallocate($im, 255, 255, 255);
				imagefill($image, 0, 0, $white);
				
				//save to file system, my local drive
				imagejpeg($image, 'drawing_image/'.$user."whiteborad");
				if ($conn->query($sql) === TRUE) {
					header("Location: profile.php?username=$user");
				} else {
					echo "Error: ". $sqlre . "<br>" . $conn->error;
				}
			} else {
				echo "username already taken"."<br>";
			}	
			
			
		}
        
    } 
        
?>