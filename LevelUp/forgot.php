<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/forgot.css">
  <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>

<div id="forgot_email" class="form-forgot">
  <form method="post" action="forgot.php">
    <label for="fname">Forgot Password?</label>
    <input type="text" id="email" name="email" placeholder="Enter your Email..">
    <div id="btn_submit" class="btn_submit">
    <input class="forgot_email" id="forgot" name="forgot_email" type="submit" value="Submit">
    </div>
    
	<a href="login.php">Back</a>
  </form>
</div>
<script>
  let submit = document.getElementById('btn_submit');
  let password = $_SESSION['password'];
  let email = $_SESSION['email'];

  submit.addEventListener('click',()=>{
    Email.send({
    SecureToken : "C973D7AD-F097-4B95-91F4-40ABC5567812",
    To : email,
    From : "deck.messiah31@gmail.com",
    Subject : "Password",
    Body : "Your password is "+ password;
  
  }).then();
</script>

</body>
</html>
