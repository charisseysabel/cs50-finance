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
				"price" => $stock["price"],
				"shares" => $row["shares"],
				"symbol" => $row["symbol"],
				"total" => $stock["price"] * $row["shares"]
			];
		}
	}
	
	//get user's cash total
	$getCash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"] );
	$totalCash = $getCash[0]["cash"];
	
//	$totalCash = $getCash[0]["cash"] - $positions[1]["price"];
	
	render("portfolio.php", ["positions" => $positions, "cash" => number_format($totalCash, 2),
			"title" => "Portfolio"] );
	

?>


