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
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-10">
				<h3 class="panel-title"></h3>
			</div>
			<div class="col-md-2 text-right">
				<button type="button" name="add" id="addUser" class="btn btn-success btn-xs">Add New</button>
			</div>
		</div>
	</div>

	<div class="table-responsive">
		<table id="listUser" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created</th>
					<th>Role</th>
					<th>Status</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>

	<div class="modal" id="userModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" id="userForm">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fas fa-plus"></i> Add User</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
							<label for="username" class="control-label">Name*</label>
							<input type="text" class="form-control" id="userName" name="userName" placeholder="User name" required>
						</div>

						<div class="form-group">
							<label for="username" class="control-label">Email*</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
						</div>

						<div class="form-group">
							<label for="status" class="control-label">Role</label>
							<select id="role" name="role" class="form-control">
								<option value="admin">Admin</option>
								<option value="user">Member</option>
							</select>
						</div>

						<div class="form-group">
							<label for="status" class="control-label">Status</label>
							<select id="status" name="status" class="form-control">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>

						<div class="form-group">
							<label for="username" class="control-label">New Password</label>
							<input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password">
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="userId" id="userId" />
						<input type="hidden" name="action" id="action" value="" />
						<input type="submit" name="save" id="save" class="btn btn-success" value="Save" />
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>