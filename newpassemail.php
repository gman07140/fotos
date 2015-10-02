<?php
/*
    newpassemail.php - sends an email to a user with link to reset password
*/
    include_once("pics/PHPMailer/PHPMailerAutoload.php");
    require("../include/config.php");

if (empty($_POST["email"]))
        {
            echo "**Please enter your email";
            exit();
        }

        //try to find email in database
        $numrows = query("SELECT userID, username, password, COUNT(email) AS CountofEmails FROM users WHERE email = ?", $_POST['email']);

        if ($numrows[0]["CountofEmails"] == 0)
        {
            echo "**Email does not exist.  Please contact administrator.";
            exit();
        }
        else
        {
            $id = $numrows[0]["password"];
            $user = $numrows[0]["username"];
        
            $mail = new PHPMailer();
            
            $mail->IsSMTP();
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "ssl";                 // sets the prefix to the server
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 465;                   // set the SMTP port

            $mail->Username   = EMAIL;   // GMAIL username
            $mail->Password   = EPASSWORD;
            
            $mail->SetFrom(EMAIL);
            
            $mail->AddAddress($_POST["email"]);
            
            $mail->Subject = "Password reset request";
            
            $mail->Body = "Hi " . $user . "! \n\n Click the following link to reset your password:\n\n http://www.lakefotos.com/newpass.php?action&userid=" . $id . "";
            
            if($mail->Send() == false)
            {
                echo "email failed due to " . $mail->ErrInfo . "";
                die($mail->ErrInfo);
            }
            else
            {
                echo "Email sent!";
            }
        }
?>