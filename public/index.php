<?php

    // configuration
    require("../includes/config.php");
//    require("./css/portfolio-style.css"); 
    
	$positions = [];
	$rows = query("SELECT shares, symbol FROM portfolio WHERE id = ?", $_SESSION["id"] );
	foreach($rows as $row)
	{
		$stock = lookup($row["symbol"]);
		if($stock !== false)
		{
			$positions[] = [
				"name" => $stock["name"],
				"price" => number_format($stock["price"], 2 ),
				"shares" => $row["shares"],
				"symbol" => $row["symbol"],
				"total" => number_format(($stock["price"] * $row["shares"]), 2 )
			];
		}
	}
	
	//get user's cash total
	$userRow = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
	$totalCash = $userRow[0]["cash"];
	
	

	
	render("portfolio.php", ["positions" => $positions, "title" => "Portfolio", "totalCash" => number_format($totalCash , 2) ] );
	

?>


