<?php
require 'assets/class/class.phpmailer.php';

if (isset($_POST['submit'])) {

    $teacher_name = trim($_POST['name']);
    $name = trim($_POST['editor_name']);
    $class = trim($_POST['class']);
    $gender = trim($_POST['gender']);
    $title = trim($_POST['title']);
    $url = trim($_POST['url']);
    $email = trim($_POST['email']);

    $body = "
<div>$teacher_name $gender,</div>
<p></p>
<div>
    <div>
        <div>
            <div>We are so excited that we are finally able to share the result of your hard work&nbsp;with you.</div>
            <div><br />It's the flipped class video titled -<strong> $title</strong></div>
            <div><strong>&nbsp;</strong></div>
            <div>Also, Please edit the video title in Teacher's Title column of the sheet.</div>
            <div>&nbsp;</div>
            <div>Please do not hesitate to let us know if you have any suggestions.&nbsp;Please post it on&nbsp;<a href='$url' target='_blank'>Flipped Class Video Spreadsheet.</a></div>
        </div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>Thanks,</div>
    </div>
    <div>$name</div>
    <p></p>
    <span style='background-color:rgb(204,204,204); font-family: arial,serif'>
        <span style='color:rgb(119,119,119);font-size:12px'>NOTE: Please do not reply to this message email address is used to notify about video only</span>
    </span>  
</div>";

    $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
    $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for gmail
    $mail->Port = '587';
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'rnd@deerwalk.edu.np';                    //Sets SMTP username
    $mail->Password = 'i am hero';                    //Sets SMTP password
    $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = "rnd@deerwalk.edu.np";                    //Sets the From email address for the message
    $mail->FromName = 'Research and Development Unit';                //Sets the From name of the message
    $mail->AddAddress($email);        //Adds a "To" address
    $mail->AddAddress("bidish.acharya@deerwalk.edu.np");        //Adds a "To" address
    $mail->AddAddress("ujjwal.poudel@sifal.deerwalk.edu.np");        //Adds a "To" address
    $mail->WordWrap = 50;                         //Sets word wrapping on the body of the message to a given number of characters
    $mail->Hostname = 'localhost.localdomain';       //to send unlimited emails from localhost
    $mail->IsHTML(true);                            //Sets message type to HTML if you want to send message with html tags
    $mail->Subject = "Your Flipped Class Video of Class " . $class . ": " . $title;
//    $mail->SMTPDebug = 2;
    $mail->Body = $body;                //An HTML or plain text message body
    if ($mail->Send())                                //Send an Email. Return true on success or false on error
    {
        echo "<SCRIPT type='text/javascript'>
			alert('Email Successfully Sent!!!');
			window.location.replace('index.php');</SCRIPT>";
    } else {
        echo "<SCRIPT type='text/javascript'>
			alert('Cannot Send Email. Please try again later.');
            window.location.replace('index.php');</SCRIPT>";
    }


} else {
    header("location: index.php");
}

?>


