<div class="modal" id="ticketModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="ticketForm">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Add Ticket</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<div class="form-group">
						<label for="subject" class="control-label">Subject</label>
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
					<div class="form-group">
						<label for="department" class="control-label">Department</label>
						<select id="department" name="department" class="form-control" placeholder="Department...">
							<?php $tickets->getDepartments(); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="message" class="control-label">Message</label>
						<textarea class="form-control" rows="5" id="message" name="message"></textarea>
					</div>
					<div class="form-group">
						<label for="status" class="control-label">Status</label>
						<br />
						<label class="radio-inline">
							<input type="radio" name="status" id="open" value="0" checked required> Open
						</label>
						<?php if (isset($_SESSION["admin"])) { ?>
							<label class="radio-inline">
								<input type="radio" name="status" id="close" value="1" required> Close
							</label>
						<?php } ?>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<input type="hidden" name="ticketId" id="ticketId" />
					<input type="hidden" name="action" id="action" value="" />
					<input type="submit" name="save" id="save" class="btn btn-success" value="Save" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>