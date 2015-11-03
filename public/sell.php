<?php
	require("../includes/config.php");

		// display the form / stocks
		$positions = [];
		$rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"] );
		foreach($rows as $row)
		{
				$positions[] = [ "symbol" => $row["symbol"],
								"shares" => $row["shares"]
				 ];		
		}

		
		// remove the stock from portfolio
		if(!empty($_POST["symbol"]))
		{
			$delete = query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
			if($delete === false)
			{
				apologize("Transaction error.");
			}
			
			// get selling price to be added to user's cash
			$stkPrice = lookup($row["symbol"]);
			// get the total price
			$totalSold = $stkPrice["price"] * $row["shares"]; 
			
			$cashUpdate = query("UPDATE users SET cash = cash + ? WHERE id = ?", $totalSold, $_SESSION["id"]);
			if($cashUpdate === false)
			{
				apologize("Unable to process transaction.");
			}
			
			redirect("/");
		}

		// render necessary variables
		render("sell_form.php", ["title" => "Sell", "positions" => $positions ]);
	


?>
