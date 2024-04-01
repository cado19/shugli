<?php
	include_once "../db_conn.php";

	if (isset($_POST['id'])) {
		$id = $_POST['id'];

		$sql = "DELETE FROM tasks WHERE id = ?";
		$stmt = $con->prepare($sql);
		$res = $stmt->execute([$id]);
		if ($res) {
			echo 1;
		} else {
			echo 0;
		}
		exit();
	} else {
		header("Location: ../index.php?message=error");
	}
	

?>