<link rel="stylesheet" href="login.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet" />

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="prc/prc_register.php" method="POST">
			<h1>Create Account</h1>
			<input name="email" type="email" placeholder="Email" required/>
			<input name="username" type="text" placeholder="Username" required/>
			<input name="password" type="password" placeholder="Password" required/>
			<button type="submit">Sign Up</button>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form action="prc/prc_login.php" method="POST">
			<h1>Sign in</h1>
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			
			<a href="#">Forgot your password?</a>
			
			<!-- Gunakan type="submit" untuk tombol -->
			<button type="submit">Sign In</button>
		</form>
	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
    <script src="login.js"></script>
</footer>