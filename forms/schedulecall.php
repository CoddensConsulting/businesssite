<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'admin@coddensconsulting.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $schedulecall = new PHP_Email_Form;
  $schedulecall->ajax = true;
  
  $schedulecall->to = $receiving_email_address;
  $schedulecall->from_name = $_POST['name'];
  $schedulecall->from_email = $_POST['email'];
  $schedulecall->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $schedulecall->add_message( $_POST['name'], 'From');
  $schedulecall->add_message( $_POST['email'], 'Email');
  $schedulecall->add_message( $_POST['phone'], 'Phone')
  $schedulecall->add_message( $_POST['client'], 'Client');
  $schedulecall->add_message('Selected Products:')
  if($_POST['btn-check-1']) {
    $schedulecall->add_message('D365 for Sales');
  }
  if($_POST['btn-check-2']) {
    $schedulecall->add_message('D365 for Customer Service');
  }
  if($_POST['btn-check-3']) {
    $schedulecall->add_message('D365 for Marketing');
  }
  if($_POST['btn-check-4']) {
    $schedulecall->add_message('D365 for Field Service');
  }
  $schedulecall->add_message( $_POST['message'], 'Message', 10);

  echo $schedulecall->send();
?>
