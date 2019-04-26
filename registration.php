<?php
session_start();
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
if(!empty($sessData['status']['msg'])) {
	$statusMsg = $sessData['status']['msg'];
	$statusMsgType = $sessData['status']['type'];
	unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

<link rel="stylesheet" href="style.css" />
</head>

<div class="container">
	<h2>Create a New Account</h2>
	<?php echo !empty($statusMsg) ? '<p class="' . $statusMsgType . '">' . $statusMsg . '</p>' : ''; ?>
	<div class="regisFrm">
		<form action="userAccount.php" method="post">
			<input type="text" name="first_name" placeholder="FIRST NAME" required="">
			<input type="text" name="last_name" placeholder="LAST NAME" required="">
			<input type="email" name="email" placeholder="EMAIL" required="">
			<input type="text" name="phone" placeholder="PHONE NUMBER" required="">
			<input type="password" name="password" placeholder="PASSWORD" required="">
			<input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required="">
			<input type="file" name="image" id="profile-img" required />
			<img src="" id="profile-img-tag" width="100px" />
			<div class="send-button">
				<input type="submit" name="signupSubmit" value="CREATE ACCOUNT">
			</div>
		</form>
	</div>
</div>