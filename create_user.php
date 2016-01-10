<h3>Sign Up</h3>
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>" >
	<!--<p>Username: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type = "text" name = "name"/></p>-->
	<p>Enter Username: <input type="text" name="username"/></p>
    <p>Enter Password:  <input type="password" name="password1"/></p>
    <p>Re-enter Password: <input type="password" name="password2"/></p>
    <input type="submit" value="Submit"/>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Render information
				#$name = $_POST['name'];
        $user= $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($password1 != $password2) {
            echo "Passwords mismatch";
        }
        else {
            // Create connection
				$conn = new mysqli("XXXX","XXX", "XXX", "XXXX");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				//echo "Connected successfully"."<br>";
				$present = "SELECT username FROM users WHERE user_name = '$user'";
				$result = $conn->query($present);

				//Check if the user doesn't exist
				if(empty($result->fetch_assoc())){
					$file_system = $username."_whiteborad" ;
					$sql = "INSERT INTO users (username, password, file_location) VALUES ('$name', '$password1', '$file_system')";
					if ($conn->query($sql) === TRUE) {
						//Create dafult JPG and get the JPG image and place that in images table
						//Create image
						$image = imagecreatetruecolor(950, 400);
						$white = imagecolorallocate($im, 255, 255, 255);
						imagefill($image, 0, 0, $white);

						//save to file system, my local drive
						imagejpeg($image, 'drawing/'.$file_system);

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
