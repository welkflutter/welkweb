<?php

$to_email = "";
$subject = "Simple Email";

$body = 'This email is sent by' . htmlspecialchars($_POST["name"]) . ' with message ' .
htmlspecialchars($_POST["message"]);

$headers = 'Form: ' .$to_email . "\r\n". 
 'Reply-To' . $to_email . "\r\n".
 'X-Mailer: PHP/' . phpversion();

if(mail($to_email,$subject,$body,$headers)){
  echo "Email send successfully...";
}else{
  echo "Email sending failed...";
}

?>

<?php

  $receiving_email_address = 'clairwelk19@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>