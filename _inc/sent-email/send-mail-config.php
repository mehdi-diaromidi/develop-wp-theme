<?php
function my_phpmailer_example( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true; // Ask it to use authenticate using the Username and Password properties
    $phpmailer->Port = 2525;
    $phpmailer->Username = '2edbefbc620d2e';
    $phpmailer->Password = '5f5ca9aede8b91';
    $phpmailer->From = "info@develop-wp.local";
    $phpmailer->FromName = "Mehdi Diaromidi";
    
    // Additional settings…
    //$phpmailer->SMTPSecure = 'tls';
    // Choose 'ssl' for SMTPS on port 465, or 'tls' for SMTP+STARTTLS on port 25 or 587
    //$phpmailer->From = "you@yourdomail.com";
    //$phpmailer->FromName = "Your Name";
}
add_action( 'phpmailer_init', 'my_phpmailer_example' );
