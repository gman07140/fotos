<?php
/*
    adminlog.php - login page for administrator
*/
    // configuration
    require("../include/config.php");
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["adName"]))
        {
            echo "You must provide your admin name";
            exit();
        }
        else if (empty($_POST["adPassword"]))
        {
            echo "You must provide your password";
            exit();
        }
        // query database for user
        $rows = query("SELECT * FROM admins WHERE adName = ?", $_POST["adName"]);
        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
            // compare hash of user's input against hash that's in database
            if (crypt($_POST["adPassword"], $row["adPassword"]) == $row["adPassword"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["adminID"] = $row["adminID"];
                // redirect to admin page
                echo '<meta http-equiv="refresh" content="0;URL=admintable2.php" />';
                redirectjava("gallery.php?action&categoryid=2");
            }
            else
            {
            	echo "invalid password";
                exit();
            }
        }
        // else apologize
        else
        {
            echo "Invalid admin name";
            exit();
        }
    }
    else
    {
        render("adlogin_form.php", "header.php");
    }
?>