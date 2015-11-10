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
            echo "Username: ".$name;
            echo "<br>";
            echo "Password: ".$password;
        }
    } 
 ?>


</body>
</html>