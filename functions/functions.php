<?php
	include_once "db_conn.php";

	// get high priotity tasks 
	function high_priority_tasks(){
		global $con;
		global $hpt;
		
		$priority = "High";

		try {

			$con->beginTransaction();

			$sql = "SELECT * FROM tasks WHERE priority = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$priority]);
			$hpt = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();

		} catch (Exception $e) {
			$con->rollback();
		}

		return $hpt;
		
	}

	// get low priotity tasks 
	function low_priority_tasks(){
		global $con;
		global $lpt;
		
		$priority = "Low";

		try {

			$con->beginTransaction();

			$sql = "SELECT * FROM tasks WHERE priority = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$priority]);
			$lpt = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();

		} catch (Exception $e) {
			$con->rollback();
		}

		return $lpt;
		
	}

	function completed_tasks(){
		global $con;
		global $ct;
		$status = 1;

		try {

			$con->beginTransaction();

			$sql = "SELECT * FROM tasks WHERE completed = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$status]);
			$ct = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $ct;
	}

	function incomplete_tasks(){
		global $con;
		global $inct;
		$status = 0;

		try {

			$con->beginTransaction();

			$sql = "SELECT * FROM tasks WHERE completed = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute([$status]);
			$inct = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
		}

		return $inct;
	}
?>