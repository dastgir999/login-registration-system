<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		*{
			margin:0;
			padding: 0;
			box-sizing: border-box;
		}

		.container{
			padding:20px 50px;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			width:100vw;
			height:100vh;
			background-color: whitesmoke;
			gap:50px;



		}

		label{
			width:100px;
			display: inline-block;
/*			background: red;*/

		}

		input {
			margin-top:10px;
		}

		.btn{
			background:green;color:white;border:none;padding:5px

		}

		button{background:red;color:white;border:none;padding:5px}
	</style>
	<title>Register</title>
</head>
<body>

	<div class="container">
       <!--start reg-div-->
		<div class="reg">

		<form id="registerForm" enctype="multipart/form-data">
		<div class="form-group">
			<label>Name:</label>
			<input type="text" name="username" placeholder="username" required>
		</div>
		<div class="form-group">
			<label>Email:</label>
			<input type="email" name="email" placeholder="Email" required>
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" name="password" placeholder="Password" required>
		</div>

		<div class="form-group">
			<label>Images:</label>
			<input type="file" name="profile_image" accept="image/*" required>
		</div>

		<div class="form-group">
			
			<button type="submit">Register</button>
		</div>

		<div id="response"></div>					
			
		</form>

	</div>
	<!--close reg-div-->

	 <!--start log-div-->
		<div class="log">

		<form id="loginForm">
		
		<div class="form-group">
			<label>Email:</label>
			<input type="email" name="email" placeholder="Email" required>
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" name="password" placeholder="Password" required>
		</div>

		

		<div class="form-group">
			
			<button type="submit" class="btn">Login</button>
					<div id="response2"></div>	
		</div>					
			
		</form>

	</div>
	<!--close log-div-->
		
		

	</div>


	<script>

		// Register

		document.getElementById('registerForm').addEventListener('submit',function(e){
			e.preventDefault();
			const formData = new FormData(this);

			fetch('register.php',{
				  method:'POST',
				  body:formData,

			})
			.then(response =>response.json())
			.then(data => {
				document.getElementById('response').innerText=data.message;
			})
			.catch(error =>console.error('Error:',error));

		});






		// login process


		document.getElementById('loginForm').addEventListener('submit',function(e){
			e.preventDefault();

			const formData = new FormData(this);

			fetch('login.php',{
               method:'POST',
               body:formData				
			})
			.then(response => response.json())
			.then(data =>{
				if(data.status === 'success'){
					window.location.href= data.redirect;

				}else{
				document.getElementById('response').innerText = data.message;
			}

			})
			.catch(error =>console.error('Error'.error));

		});
		


	</script>




</body>
</html>