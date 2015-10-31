<!--
	NOTE:
		INDEX.PHP is a controller; it controls the behavior of my website.

-->



<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    render("portfolio.php", ["title" => "Portfolio"]);

?>


