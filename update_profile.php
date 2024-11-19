<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		*{
			margin:0;
			padding:0;
			box-sizing: border-box;
			font-family: sans-serif;
		}

		.container{
			   display: flex;
			   padding:50px;
			   width:100vw;
			   min-height: 100vh;
			   background:whitesmoke;
			   justify-content: center;
			   align-items: center;
			   gap:50px;
			   flex-wrap: wrap;
		}

		.container h1{
			color:green;
			font-weight: bold;
			text-transform: uppercase;
			position: relative;
		}

		.container h1:hover{
			background-color:goldenrod;
		}

				.container h1::after{
					   content:'__';
					   position:absolute;
				}



		label{
			display: inline-block;
			width:100px;
			padding-bottom:10px;
		}

		.form-container{
			width:40%;
			height:40%;
			background-color: wheat;
			padding:50px;
			box-shadow:3px 3px 5px grey;

		}

		button{
			background-color:red;
			color: white;
			font-weight:bold;
			padding:5px;
			border: none;
			margin-top:5px;
			width:100%;
			text-transform: uppercase;
		}

		button:hover{
			background-color:blueviolet;

		}

		@media screen and (max-width:768px){

			.form-container{
			width:100%;
			height:40%;
			background-color: wheat;
			padding:50px;

		}

		}
	</style>
	<title>Update Profile</title>
</head>
<body>

	<div class="container">
		<h1>Update User Profile</h1>
		<div class="form-container">
			<form id="updateProfileForm" enctype="multipart/form-data">
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
			
			<button type="submit">Update Profile</button>
		</div>

		<div id="response"></div>					
			
		</form>

			
		</div>
		
	</div>


	<script>
		// Update Profile
document.getElementById('updateProfileForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('update_profile-ac.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById('response').innerText = data.message;
        })
        .catch(error => console.error('Error:', error));
});

	</script>

</body>
</html>