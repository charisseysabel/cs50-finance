<?php
	require("../includes/config.php");
	
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("buy_form.php", ["title" => "Buy"] );
	}
	else if($_SERVER["REQUEST_METHOD"] == "POST" )
	{
		// make sure that both fields have input
			if(empty($_POST["symbol"]) || empty($_POST["shares"]))
			{
				apologize("Please enter a symbol or a share and try again.");
			}
			
		// else if both fields are NOT empty..	
			else if(!empty($_POST["symbol"]) && (!empty($_POST["shares"])))
			{
				// check if symbol is valid...
					$stock = lookup($_POST["symbol"]);
					if($stock === false)
					{
						apologize("Symbol not found.");
					}
				
				// check if shares is valid...
					if(!(preg_match("/^\d+$/", $_POST["shares"])) )
					{
						apologize("Please enter a non-negative number.");
					}
				
				// get the amount of cash left from DB
					$rows = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"] );
					$cashLeft = $rows[0]["cash"];
					
				// get the total cost of the stock
					$amtOwed = $stock["price"] * $_POST["shares"];	
				
				// check if the stock price is < cash
					// if price > cash
						if($amtOwed > $cashLeft)
						{
							apologize("You're too broke to make this transaction.");
						}
					// else if price < cash
						else if($amtOwed < $cashLeft)
						{
							// update portfolio
							$buy = query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",
									$_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"] );
							
							if($buy === false)
							{
								apologize("Error while buying stocks.");
							}
							
							// update user's cash 
							$cashUpdate = query("UPDATE users SET cash = cash - ? WHERE id = ?", $amtOwed, $_SESSION["id"]);
							if($cashUpdate === false)
							{
								apologize("Unable to process transaction.");
							}
						}					
					redirect("/");		
			}
	
		render("buy_form.php", ["title" => "Buy"]);
	}
?>
