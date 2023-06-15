<?php
if(isset($_POST['email'])) {
 
    // CHANGE THE FOLLOWING VARIABLES TO YOUR OWN SETTINGS
    $email_to = "s6406021421294@kmutnb.ac.th";
    $email_subject = "Website Contact Form";
 
    function died($error) {
        echo "Sorry, but there were error(s) found with the form you submitted: ";
        echo $error."<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('One or more fields are missing.');       
    }
 
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $subject = $_POST['subject']; // required
    $message = $_POST['message']; // required
 
    $email_message = "Details:\n\n";
 
    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
    // create email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "X-Mailer: PHP/".phpversion();
 
    mail($email_to, $email_subject, $email_message, $headers);
    echo "Thank you for contacting us. We will be in touch with you shortly.";
}
