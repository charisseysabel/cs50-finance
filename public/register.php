<?php
	//configuration
	require("../includes/config.php");

	//if user reached page via GET
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		//render form
		render("register_form.php", ["title" => "Register"]);
	}
	// else if user reached page via POST (submitting a form)
	else if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST["username"]))
		{
			apologize("Please provide a username.");
		}
		else if(empty($_POST["password"]))
		{
			apologize("Please enter a password");
		}
		else if(empty($_POST["confirmation"]))
		{
			apologize("Please confirm password");
		}
		else if(($_POST["password"]) !== ($_POST["confirmation"]))
		{
			apologize("Password do not match. Try again.");
		}

		$result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]) );
			if($result === false)
			{
				apologize("Registration failed. Username taken.");
			}

		$rows = query("SELECT LAST_INSERT_ID() AS id");
		$id = $rows[0]["id"];

		$_SESSION["id"] = $id;

		redirect("/");
	}

?>
