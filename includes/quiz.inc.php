<?php
session_start();
require 'dbh.inc.php';


if (isset($_POST['quiz-submit'])) {
	$score =0;

	$sql = "SELECT * FROM QuizQuestion WHERE IdCategory = 2";
	$result = mysqli_query($conn, $sql);
	$counter = 1;

	while ($row = mysqli_fetch_assoc($result)) {
		$answer = $_POST['ans_'.$counter];
		if ($answer == $row['CorrectAns']) {
			$score++;
		}
		$counter++;
	}


	$sql = "INSERT INTO CustomerScore (Score, IdCategory, IdCustomer) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: ../registration.php?error=sqlerror");
		exit();
	}
	else {
		$id = $_SESSION['customerId'];
		$category = 2;

		mysqli_stmt_bind_param($stmt, "iii", $score, $category, $id);

		mysqli_stmt_execute($stmt);
		header("Location: ../profile.php?quizsubmitted&score=$score");
		exit();
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);


}
else {
    header("Location: ../profile.php");
    exit();
  }






