<?php
include 'init.php';
if (!$users->isLoggedIn()) {
	header("Location: login.php");
}
include('inc/header.php');
$user = $users->getUserInfo();
?>
<script src="js/general.js"></script>
<script src="js/user.js"></script>

<?php include('inc/container.php'); ?>
<?php include('inc/navbar.php'); ?>
<div class="container bg-white pt-4 pb-3">
	<div class="table-responsive">
		<form method="post" id="userForm">
			<div class="modal-header">
				<h4 class="modal-title">Update Profile</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="username" class="control-label">Name*</label>
					<input type="text" class="form-control" id="userName" name="userName" value="<?php echo $user['name']; ?>" placeholder="User name" required>
				</div>

				<div class="form-group">
					<label for="username" class="control-label">Email*</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email" required>
				</div>

				<div class="form-group">
					<label for="username" class="control-label">New Password</label>
					<input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Leave blank to retain current password">
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="userId" id="userId" value="<?php echo $user['id']; ?>" />
				<input type="hidden" name="action" id="action" value="updateUser" />
				<input type="submit" name="save" id="save" class="btn btn-success" value="Save" />
			</div>
		</form>
	</div>
</div>
<?php include('inc/footer.php'); ?>