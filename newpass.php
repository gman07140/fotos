<?php
/*
    newpass.php - after requesting a new password and following the link in the email,
                  user is brought to this page to create new password
*/
    // configuration
    require("../include/config.php");

    // this value will be passed into the form (through render function) where it can be saved for later use
    $id = $_GET["userid"];

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["pass"]))
        {
            echo "**Please create a password";
        }
        else if (empty($_POST["confirm"]))
        {
            echo "**Please confirm your password";
        }
        else if ($_POST["confirm"] != $_POST["pass"])
        {
            echo "**Passwords do not match.";
        }
        else
        {
            // update the password to the users submission
            $rows = query("UPDATE users SET password =? WHERE password =?", crypt($_POST["pass"]), $_POST["uid"]);
            if($rows === false)
            {
                echo "could not update password - please contact administrator";
            }
            else
            {
                echo "password updated!";
            }
        }
    }
    else
    {
        render("newpass_form.php", "header.php", ["id" => $id]);
    }
?>