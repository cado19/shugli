<?php
// This page will show tasks by priority 
	$high_priority_tasks = high_priority_tasks();
	$low_priority_tasks = low_priority_tasks();
?>
<main>
<div class="container page-todo bootstrap bootdey snippets">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once "partials/sidebar.php"; ?>
		</div>
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
				<div class="accordion accordion-flush">
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOne">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
					        High Priority Tasks
					      </button>
					    </h2>
					    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
					      <div class="accordion-body">
					      	
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
											<span id="<?php echo $high_priority_task['id']; ?>" class="remove-task badge bg-secondary" aria-description="remove task">X</span>
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
											<span id="<?php echo $high_priority_task['id']; ?>" class="remove-task badge bg-secondary" aria-description="remove task">X</span>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
					      </div>
					    </div>
					</div>

					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOne">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
					        Medium Priority Tasks
					      </button>
					    </h2>

					    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
					    	<div class="accordion-body">
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
					    	</div>
					    </div>
					</div>


					<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingOne">
						      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseOne">
						        Low Priority Tasks
						      </button>
						    </h2>

						    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
						    	<div class="accordion-body">
						    		
									<!-- Low Priority Tasks  -->

									<div class="priority low"><span>low priority</span></div>
									<?php foreach ($low_priority_tasks as $low_priority_task): ?>
										<div class="task low">
										<?php if($low_priority_task['completed']): ?>
												<div class="desc">
													<input type="checkbox" name="completed" class="completed" 
													data-task-id="<?php echo $low_priority_task['id']; ?>" 
													checked>

													<div class="title completed"> <?php echo $low_priority_task['name']; ?> </div>
													<div>some shit</div>
												</div>
												<div class="time">
													<?php
													 $created = strtotime($low_priority_task['created_at']);
													?>
													<div class="date"> <?php echo date("M d, Y", $created); ?></div>
													<span id="<?php echo $low_priority_task['id']; ?>" class="remove-task badge bg-secondary" aria-description="remove task">X</span>
												</div>
											<?php else: ?>
												<div class="desc">
													<input type="checkbox" name="completed" class="completed" 
													data-task-id="<?php echo $low_priority_task['id']; ?>" >
													
													<div class="title"> <?php echo $low_priority_task['name']; ?> </div>
													<div>some shit</div>
												</div>
												<div class="time">
													<?php
													 $created = strtotime($low_priority_task['created_at']);
													?>
													<div class="date"> <?php echo date("M d, Y", $created); ?></div>
													<span id="<?php echo $low_priority_task['id']; ?>" class="remove-task badge bg-secondary" aria-description="remove task">X</span>
												</div>
											<?php endif; ?>
											</div>
										<?php endforeach; ?>
						    	</div>
						    </div>
						</div>

					</div>
				</div>



			</div>
		</div>
		</div>
	</div>
</main>
	<script src="js/complete_task.js"></script>
	<script src="js/remove_task.js"></script>