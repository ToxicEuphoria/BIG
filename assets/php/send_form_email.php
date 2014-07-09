<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "johndangerstorey@gmail.com";
    $email_subject = "Bitcoin Info Request";
     
     
    function died($error) {
        // your error code can go here
        echo "<h3>We are very sorry, but there were error(s) found with the form you submitted.</h3>";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        // !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        // !isset($_POST['website']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but you did not provide the required information.');       
    }
     
    $first_name = $_POST['first_name']; // required
    // $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    // $website = $_POST['website']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  // if(!preg_match($string_exp,$last_name)) {
  //   $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  // }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    // $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    // $email_message .= "website: ".clean_string($website)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<html>
<head>
<title>Thank you!</title>
<meta http-equiv="refresh" content="4; URL=http://bitcoininvestinggroup.com">
<link href="'http://fonts.googleapis.com/css?family=Open+Sans'" rel="'stylesheet'" type="'text/css'" />
<meta name="keywords" content="automatic redirection">
<style>
body { background: #34495e; color: #fff; font-family: 'Open Sans', sans-serif; }
a { color: rgba(46, 204, 113, 0.8); }
a:hover { color: rgba(46, 204, 113,1.0); }
.container { width: 1000px; height: auto; margin: 0 auto; margin-top: 100px; }

@media (max-width: 767px) {
  .container     { width: 400px; }
}

@media (max-width: 480px) {
  .container     { width: 220px; }
}

.info {
	background: #2C3E50;
	padding: 20px;
	font-size: 13px;
	text-align: center;
}

@media (max-width: 767px) {
  .info     { text-align: left; }
}

.success { font-size: 12px; text-align: center; color: #fff; background: #2ecc71; padding-left: 20px; padding-right: 20px; padding-top: 40px; padding-bottom: 40px; }
@media (max-width: 767px) {
  .success     { font-size: 10px; text-align: left; }
}

.error { font-size: 12px; text-align: center; color: #fff; background: #e74c3c; padding-left: 20px; padding-right: 20px; padding-top: 40px; padding-bottom: 40px;  }
</style>
</head>
<body>
<div class="container">
<div class="success">
<h1>
Thank you for contacting us. We will be in touch with you very soon.
</h1>
</div>
<div class="info">
If your browser doesn't automatically go to home page within a few seconds, 
you may want to go to 
<a href="http://www.bitcoininvestinggroup.com/">home page</a> 
manually.
</div>
</body>
</html>
<?php
}
?>