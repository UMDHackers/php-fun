<head>
		<title>Drawing</title>
		<style>
			#my_canvas:active {
				cursor:crosshair;
			}
			#my_canvas {
				border:1px solid black;
			}
			input{
				text-align:center;
			}
		</style>
		
	</head>
	<body>
	
		<?php
			$username = $_GET['username'];
			$conn = new mysqli("localhost", "XXXX", "XXXXXX", "XXXX");
			//Check connection 
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			//echo "Connected successfully"."<br>";
			
			
		?>
		<!--Canvas should be updated to the users last drawn broad-->
		<h1><?php echo $username?>'s whiteborad</h1>
		<canvas id = "my_canvas" width = "950" height = "400" >
			
		</canvas>
		
		<p id = "coor">X coor: Y coor:</p>
		<p>Colors</p>
		
		<form>
			<input id = "black" type = "radio"  name = "color" value= "black" checked> Black
		
			<input id = "green" type = "radio" name = "color" value= "green"> Green
			
			<input id = "red" type = "radio" name = "color" value= "red"> Red
			
			<input id = "yellow" type = "radio" name = "color" value= "yellow"> Yellow
			
			<input id = "blue" type = "radio" name = "color" value= "blue"> Blue
			
			<input id = "purple" type = "radio" name = "color" value= "purple"> Purple
			
			<input id = "white" type = "radio" name = "color" value= "white"> Eraser
		</form>
		<button id = "buttn1" onclick = "myClear()">
			Clear
		</button>
		
		<script>
			function myClear() {
				var canvas2 =  document.getElementById("my_canvas");
				var context = canvas2.getContext("2d");
				context.clearRect(0, 0, canvas2.width, canvas2.height);
			}
			var click = document.getElementById("my_canvas");
			var color = document.querySelector('input[name = "color"]:checked').value;
			click.onmousedown = function() {
				document.onmousemove = function() {
					color = document.querySelector('input[name = "color"]:checked').value;
					//var canvas = document.getElementById("my_canvas");
					var mouse_x = event.clientX;
					var mouse_y = event.clientY;
					var coor = "X coor:" + mouse_x + " Y coor:" + mouse_y;
					var ctx = click.getContext("2d");
					//ctx.fillStyle = color;
					ctx.beginPath();
					ctx.fillStyle = color;
					//ctx.arc(mouse_x - 490, mouse_y - 10, 10, 10, 2*Math.PI);
					ctx.fillRect(mouse_x - 10, mouse_y - 10, 10, 10);
					ctx.fill();
					ctx.stroke();
					document.getElementById("coor").innerHTML =  coor;
				}
			}
			click.onmouseup = function() {
				document.getElementById("coor").innerHTML = "X coor: Y coor:";
				document.onmousemove = function(){};
			}
		
			//document.getElementById("coor2").innerHTML = $('input[name="genderS"]:checked').val();
		</script>
	</body>