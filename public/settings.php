<?php
	require("../includes/config.php");
	
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("settings_op.php", ["title" => "Settings"]);
	}
?>
