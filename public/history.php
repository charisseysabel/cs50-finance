<?php
	require("../includes/config.php");
	
	// display the data
	$positions = [];
	$rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"] );
	foreach($rows as $row)
	{
		$positions[] = [
			"transaction" => $row["transaction"],
			"time" => $row["time"],
			"symbol" => $row["symbol"],
			"shares" => $row["shares"],
			"price" => number_format($row["price"], 2)
		];
	}
	
	
	render("transactions.php", ["title" => "History & Transactions", "positions" => $positions]);
	
?>
