<?php
	header("Content-Type: application/json; charset=utf-8");
	include 'common.php';

	connectToDB();
	
	$safe_player_id = mysqli_real_escape_string($mysqli, $_GET['DigitsID']);

	$get_player_query = "SELECT * FROM Player WHERE DigitsID = " . $safe_player_id;
	$get_player_response = mysqli_query($mysqli, $get_player_query) or die(mysqli_error($mysqli));
	
	$row = mysqli_fetch_assoc($get_player_response);
	$player_data = json_encode($row);

	echo $player_data;

	mysqli_free_result($get_player_response);
	mysqli_close($mysqli);	
?>
