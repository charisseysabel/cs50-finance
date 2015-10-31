<?php
    //include config
    require("../includes/config.php");
    
    //if user reached page via "GET" method
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
    	render("quote_form.html", ["title" => "Quote"]);
    }
    // else if user reached page via a POST (submitting form)
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$stock = lookup($_POST["symbol"]);
    	
    	if($stock === false)
    	{
    		apologize("Symbol does not exist! Try again.");
    	}
    	else
    	{
    		render("latest-price.html", ["title" => "Quote", "price" => $stock["price"],
    				"name" => $stock["name"], "symbol" => strtoupper($stock["symbol"]) ]);
			
    		
    	}

    }
    
    
    
    
?>
