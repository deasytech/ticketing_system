<?php 
include 'init.php'; 
if(!$users->isLoggedIn()) {
	header("Location: login.php");	
} else {
	header("Location: ticket.php");	
}
include('inc/header.php');
$user = $users->getUserInfo();
?>

<script src="js/general.js"></script>
<script src="js/tickets.js"></script>

<?php include('inc/container.php');?>
<?php include('inc/navbar.php'); ?>
<div class="container bg-white pt-4">
	<div class="row home-sections">
	<div class="pb-3">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<p>View and manage tickets that may have responses from support team.</p>
				</div>
				<div class="col-md-2 text-right mb-3">
					<button type="button" name="add" id="createTicket" class="btn btn-success btn-xs">Create Ticket</button>
				</div>
			</div>
		</div>
		<table id="listTickets" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Ticket ID</th>
					<th>Subject</th>
					<th>Department</th>
					<th>Created By</th>					
					<th>Created</th>	
					<th>Status</th>
					<th></th>
					<th></th>
					<th></th>					
				</tr>
			</thead>
		</table>
	</div>
	<?php include('add_ticket_model.php'); ?>
</div>	
<?php include('inc/footer.php');?>