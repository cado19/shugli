<?php
	include_once "../db_conn.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$name = $_POST['task'];
		$priority = "Low";
		$completed = "false";

		$sql = "INSERT INTO tasks (name, priority, completed) VALUES (?,?,?)";
		$stmt = $con->prepare($sql);
		$res = $stmt->execute([$name, $priority, $completed]);
		if ($res) {
			header("Location: ../index.php");
		} else {
			header("Location: ../index.php?message=error");
		}
		exit();
	} else {
		header("Location: ../index.php?message=error");
	}
	

?>