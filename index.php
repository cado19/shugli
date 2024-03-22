<?php
	include_once "functions.php";
	$high_priority_tasks = high_priority_tasks();
	$low_priority_tasks = low_priority_tasks();
		
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Shugli</title>
</head>
<body>
	<div class="container">
	<div class="container page-todo bootstrap bootdey snippets">
		<div class="col-sm-7 tasks">
			<div class="add-task">
				<h1>Shugli</h1>
				<form method="POST" action="php/add.php">
					<input type="text" name="task" placeholder="New Task" class="form-control" required>
					<button type="submit" class="btn btn-danger add-btn">Add &nbsp; <span>&#43;</span></button>
				</form>
			</div>

			<div class="task-list">
				<h1>Tasks</h1>
				<!-- High Priority Tasks  -->
				<div class="priority high"><span>high priority</span></div>
				<?php foreach ($high_priority_tasks as $high_priority_task): ?>
					<div class="task high">
						<?php if($high_priority_task['completed']): ?>
							<div class="desc">
								<input type="checkbox" name="completed" class="completed" 
								data-task-id="<?php echo $high_priority_task['id']; ?>" 
								checked>

								<div class="title completed"> <?php echo $high_priority_task['name']; ?> </div>
								<div>some shit</div>
							</div>
							<div class="time">
								<?php
								 $created = strtotime($high_priority_task['created_at']);
								?>
								<div class="date"> <?php echo date("M d, Y", $created); ?></div>
								<span id="<?php echo $high_priority_task['id']; ?>" class="remove-task badge" aria-description="remove task">X</span>
							</div>
						<?php else: ?>
							<div class="desc">
								<input type="checkbox" name="completed" class="completed" 
								data-task-id="<?php echo $high_priority_task['id']; ?>" >
								
								<div class="title"> <?php echo $high_priority_task['name']; ?> </div>
								<div>some shit</div>
							</div>
							<div class="time">
								<?php
								 $created = strtotime($high_priority_task['created_at']);
								?>
								<div class="date"> <?php echo date("M d, Y", $created); ?></div>
								<span id="<?php echo $high_priority_task['id']; ?>" class="remove-task badge" aria-description="remove task">X</span>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>

				<!-- Medium Priority Tasks  -->
				<div class="task medium">
					<div class="desc">
						<input type="checkbox" name="completed" class="completed" data-task-id="<?php echo $high_priority_task['id']; ?>">
						<div class="title">Lorem Ipsum</div>
						<div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
					</div>
					<div class="time">
						<div class="date">Jun 1, 2012</div>
						<div> 1 day</div>
					</div>
				</div>

				<!-- Low Priority Tasks  -->

				<div class="priority low"><span>low priority</span></div>
				<?php foreach ($low_priority_tasks as $low_priority_task): ?>
					<div class="task low">
						<div class="desc">
							<input type="checkbox" name="completed" class="completed" data-task-id="<?php echo $high_priority_task['id']; ?>">
							<div class="title"> <?php echo $low_priority_task['name']; ?> </div>
							<div>some shit</div>
						</div>
						<div class="time">
							<?php
							 $created = strtotime($low_priority_task['created_at']);
							?>
							<div class="date"> <?php echo date("M d, Y", $created); ?></div>
							<span id="<?php echo $low_priority_task['id']; ?>" class="remove-task badge" aria-description="remove task">X</span>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
	</div>
	<script src="js/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$('.remove-task').click(function(){
				const id = $(this).attr('id');
				$.post("php/remove.php",
					{
						id: id
					},
					(data) => {
						if(data){
							$(this).parent().parent().hide(600);
						}
					}
				);
			});

			$('.completed').click(function(){
				const id = $(this).attr('data-task-id');
				$.post("php/complete.php", 
					{
						id: id
					},
					(data) => {
						if(data != "error"){
							const title = $(this).next();
							if(data == "1"){
								title.removeClass('completed');
							}else {
								title.addClass('completed');
							}
						}
					}
				)
			});
		});
	</script>
</body>
</html>