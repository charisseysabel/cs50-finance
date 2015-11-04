<?php
	require("../includes/config.php");
	
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("new_pw_form.php", ["title" => "Change Password"]);
	}
	else if($_SERVER["REQUEST_METHOD"] == "POST")
	{	
	/*	// crypt current password input
			$crypt_pw = crypt($_POST["password"]);
		
		// check to see if current password matches the password input
			$get_pw = query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]);
			$pw_match = $get_pw[0]["hash"];
			
			if(crypt($_POST["password"]) !== $pw_match)
			{
				apologize("Incorrect password");
			}
	*/	
		// check for other errors
			if(empty($_POST["password"]) )
			{
				apologize("Please enter your old password.");
			}
			else if(empty($_POST["new_password"]) )
			{
				apologize("Please enter a new password.");
			}
			else if(empty($_POST["new_again"]) )
			{
				apologize("Please confirm your new password.");
			}
			else if(($_POST["new_password"]) !== ($_POST["new_again"]) )
			{
				apologize("New password inputs do not match.");
			}
			else if($_POST["new_password"] === ($_POST["password"]) )
			{
				apologize("Old and new password match. Please try another one.");
			}
				
		// if input passes checkpoint...
			else if((!empty($_POST["password"])) && ($_POST["new_password"] === $_POST["new_password"]) )
			{
				$update_pw = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["new_password"]), $_SESSION["id"] );
				if($update_pw === false)
				{
					apologize("Error updating password");
				}	
			}
		
		redirect("settings.php");
	}
	
?>
