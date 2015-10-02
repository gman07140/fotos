<?php

    include_once("pics/PHPMailer/PHPMailerAutoload.php");
    require("../include/config.php");

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
        
        $mail->Subject = "Imagens prontas!";
        
        $mail->Body = "Ola " . $_POST["username"] . "! \n\n Clique no link para acessar suas imagens:\n\n http://www.lakefotos.com/clientlog.php \n\n Entre em contato com a Jennifer para receber sua senha.";
        if($mail->Send() == false)
        {
            echo "email failed due to " . $mail->ErrInfo . "";
            die($mail->ErrInfo);
        }
        else
        {
            echo "Client notified!";
        }
?>
