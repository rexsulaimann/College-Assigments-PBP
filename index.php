<link rel="stylesheet" href="login.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet" />

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="email" placeholder="Email" />
			<input type="text" placeholder="Username" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form action="/prc/prc_login.php" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
	
			<!-- Tambahkan name untuk input agar data bisa diterima oleh PHP -->
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