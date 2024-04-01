<?php
	include_once "../db_conn.php";
	if (isset($_POST['id'])) {
		global $task;
		global $res;
		global $con;

		$id = $_POST['id'];

		// GET THE TASK ID, COMPLETED BASED ON THE ID
		try {
			$con->beginTransaction();

			$sql = "SELECT id, completed FROM tasks WHERE id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$id]);
			$task = $stmt->fetch();

			$con->commit();
			
		} catch (Exception $e) {
			$con->rollback();
		}


		//SET VARIABLES FOR CHECKED VALUES FOR UPDATE SQL
		$t_id = $task['id'];
		$t_check = $task['completed'];

		$t_checked = $t_check ? 0 : 1; // so if t_check is 1 make it zero and if it's zero make it 1

		//UPDATE THE TASK COMPLETED BASED ON ABOVE VARIABLES
		try {
			$con->beginTransaction();

			$sql = "UPDATE tasks SET completed = ? WHERE id = ?";
			$stmt = $con->prepare($sql);
			$res = $stmt->execute([$t_checked, $t_id]);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		if ($res) {
			echo $t_check;
		} else {
			echo "error";
		}
		exit();
	} else {
		header("Location: ../index.php?message=error");
	}
	

?>