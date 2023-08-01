<?php
include 'init.php';
if (!$users->isLoggedIn()) {
	header("Location: authenticate.php");
}
include('inc/header.php');
$ticketDetails = $tickets->ticketInfo($_GET['id']);
$ticketReplies = $tickets->getTicketReplies($ticketDetails['id']);
$user = $users->getUserInfo();
$tickets->updateTicketReadStatus($ticketDetails['id']);
?>
<script src="js/general.js"></script>
<script src="js/tickets.js"></script>
<?php include('inc/container.php'); ?>
<?php include('inc/navbar.php'); ?>
<div class="container bg-white pt-4">
	<section class="comment-list">
		<article class="row border-bottom pb-2 mb-2">
			<div class="col-md-10 col-sm-10">
				<div class="panel panel-default arrow left">
					<div class="panel-heading right">
						<?php if ($ticketDetails['resolved']) { ?>
							<button type="button" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-eye-close"></span> Closed
							</button>
						<?php } else { ?>
							<button type="button" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-eye-open"></span> Open
							</button>
						<?php } ?>
						<span class="ticket-title"><?php echo $ticketDetails['title']; ?></span>
					</div>
					<div class="panel-body">
						<div class="comment-post mt-2">
							<p>
								<?php echo $ticketDetails['message']; ?>
							</p>
						</div>
					</div>
					<div class="panel-heading right">
						<i class="fas fa-clock"></i> <time class="comment-date" datetime="16-12-2014 01:05"><i class="fas fa-clock-o"></i> <?php echo $time->ago($ticketDetails['date']); ?></time>
						&nbsp;&nbsp;<i class="fas fa-user"></i> <?php echo $ticketDetails['creater']; ?>
						&nbsp;&nbsp;<i class="fas fa-briefcase"></i> <?php echo $ticketDetails['department']; ?>
					</div>
				</div>
			</div>
		</article>

		<?php foreach ($ticketReplies as $replies) { ?>
			<article class="row">
				<div class="col-md-12 col-sm-12">
					<div class="panel panel-default arrow right">
						<div class="panel-heading">
							<?php if ($replies['user_type'] == 'admin') { ?>
								<i class="fas fa-user"></i> <strong class="text-dark"><?php echo $ticketDetails['department']; ?></strong>
							<?php } else { ?>
								<i class="fas fa-user"></i> <small><?php echo $replies['creater']; ?></small>
							<?php } ?>
							&nbsp;&nbsp;<i class="fas fa-clock"></i> <time class="comment-date" datetime="16-12-2014 01:05"><i class="fas fa-clock-o"></i> <?php echo $time->ago($replies['date']); ?></time>
						</div>
						<div class="panel-body">
							<div class="comment-post mt-2">
								<p>
									<?php echo $replies['message']; ?>
								</p>
							</div>
						</div>

					</div>
				</div>
			</article>
		<?php } ?>
		<?php if (!$ticketDetails['resolved']) : ?>
			<form method="post" id="ticketReply">
				<article class="row">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<textarea class="form-control" rows="5" id="message" name="message" placeholder="Enter your reply..." required></textarea>
						</div>
					</div>
				</article>
				<article class="row">
					<div class="col-md-10 col-sm-10">
						<div class="form-group">
							<input type="submit" name="reply" id="reply" class="btn btn-success" value="Reply" />
						</div>
					</div>
				</article>
				<input type="hidden" name="ticketId" id="ticketId" value="<?php echo $ticketDetails['id']; ?>" />
				<input type="hidden" name="subject" id="subject" value="<?php echo $ticketDetails['title']; ?>" />
				<input type="hidden" name="action" id="action" value="saveTicketReplies" />
			</form>
		<?php endif ?>
	</section>
	<?php include('add_ticket_model.php'); ?>
</div>
<?php include('inc/footer.php'); ?>