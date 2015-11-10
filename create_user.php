<h3>Sign Up</h3>
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>" >
    <p>Enter Username: <input type="text" name="username"/></p>
    <p>Enter Password: <input type="password" name="password1"/></p>
    <p>Re-enter Password: <input type="password" name="password2"/></p>
    <p><?php echo $password_error; ?></p>
    <input type="submit" value="Submit"/>
</form>

<!--
<script type="text/javascript">
  function correctInformation(form) {
    if(form.password1.value != form.password2.value) {
        alert("Mismatched passwords");
    } 
      
  }
</script>
-->
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Render information
        $name = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        if ($password1 != $password2) {
            echo "Passwords mismatch";
        }
        else {
            echo ""
        }
        
    } 
        
?>