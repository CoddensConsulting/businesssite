<?php

  $to = 'admin@coddensconsulting.com';
  $subject = 'Coddens Consulting - New Subscriber!';
  $subscriber_email_address = $_POST['email'];
  $message = $subscriber_email_address . 'has subscribed for updates! Huzzah!';
  $headers = "From: admin@codddensconsulting.com"

  mail($to, $subject, $message, $headers);

?>
