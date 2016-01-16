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
						$conn = new mysqli("XX","XX", "XX", "XX");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				//echo "Connected successfully"."<br>";
				$present = "SELECT * FROM users WHERE user_name = '$user'";
				//echo $present;
				$result = $conn->query($present);
				//echo "Works?";
				//echo $result;
				//Check if the user doesn't exist
				//echo $result->fetch_assoc();

				if($result->num_rows === 0){
					$file_system = $user."_whiteborad" ;
					$sql = "INSERT INTO users (user_name, password, file_location) VALUES ('$user', '$password1', '$file_system')";
					if ($conn->query($sql) === TRUE) {
						$conn->close();
						//Create dafult JPG and get the JPG image and place that in images table
						//Create image
						$image = imagecreatetruecolor(950, 400);
						$white = imagecolorallocate($image, 255, 255, 255);
						imagefill($image, 255, 255, 255);

						//save to file system, my local drive
						imagejpeg($image, 'drawings/'.$file_system.'.jpg');

						header("Location: profile.php?username=$user");
					} else {
						echo "Error: ". $conn->error;
					}
				} else {
					echo "username already taken"."<br>";
				}
			}

    }

?>
