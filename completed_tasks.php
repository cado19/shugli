<?php
	$completed_tasks = completed_tasks();
	include_once 'partials/content_start.php';
?>


	<div class="col-sm-7 tasks">
		<div class="task-list">
			<h1>Completed Tasks</h1>
			<?php foreach($completed_tasks as $ct): ?>
				<div class="task">
				<div class="desc">
					<input type="checkbox" name="completed" class="completed" 
					data-task-id="<?php echo $ct['id']; ?>" 
					checked>

					<div class="title completed"> <?php echo $ct['name']; ?> </div>
					<div>some shit</div>
				</div>
				<div class="time">
					<?php
					 $created = strtotime($ct['created_at']);
					?>
					<div class="date"> <?php echo date("M d, Y", $created); ?></div>
					<span id="<?php echo $ct['id']; ?>" class="remove-task badge bg-secondary" aria-description="remove task">X</span>
				</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php include_once 'partials/content_end.php'; ?>
<script src="js/complete_task.js"></script>
<script src="js/remove_task.js"></script>