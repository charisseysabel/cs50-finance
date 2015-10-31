<?php

    // configuration
    require("../includes/config.php"); 

    // log out current user, if any
    logout();

    // redirect user
    redirect("/");

?>



<!--
	from portfolio.php:
		logout function runs then page redirects to root page.


-->