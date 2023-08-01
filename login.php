<?php
include 'init.php';
if ($users->isLoggedIn()) {
	header('Location: ticket.php');
}
$errorMessage = $users->login();
include('inc/header.php');
?>

<div class="login-form">
	<form id="loginform" action="" method="POST">
		<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
		<h4 class="modal-title">Login to Your Account</h4>
		<?php if ($errorMessage != '') { ?>
			<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>
		<?php } ?>
		<div class="form-group">
			<input type="text" class="form-control" id="email" name="email" placeholder="Email" required="required">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
		</div>
		<div class="form-group small clearfix">
			<label class="checkbox-inline"><input type="checkbox" id="remember" name="remember"> Remember me</label>
			<a href="#" class="forgot-link">Forgot Password?</a>
		</div>
		<input type="submit" class="btn btn-primary btn-block btn-lg" name="login" value="Login">
	</form>
</div>

<?php include('inc/footer.php'); ?>