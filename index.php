
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//   use PHPMailerPHPMailerPHPMailer;
//   use PHPMailerPHPMailerException;
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  // Include autoload.php file
//   require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'akrajput01206@gmail.com';
      // Gmail Password
      $mail->Password = 'opytjqcbkojqwfyx';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('akrajput01206@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('akrajput01206@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
    //   $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";
      $mail->Body =  "<html xmlns='http://www.w3.org/1999/xhtml'>
      <head>
          <title>EdiQue</title>
          <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
          <meta name='viewport' content='width=device-width, initial-scale=1.0' />
          
      </head>
      <body style='margin:0; padding:0;' bgcolor='#eaeced'>
          <table style='min-width:320px;' width='100%' cellspacing='0' cellpadding='0' bgcolor='#eaeced'>
              <tr>
                  <td style='padding:30px 10px;'>
                      <!-- module 2 -->
                      <table class='flexible' width='600' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'>
                          <tr>
                              <td style='padding:58px 60px 52px;' bgcolor='#f9f9f9'>
                                  <table width='100%' cellpadding='0' cellspacing='0'>
                                      <tr>
                                          <td align='left' style='font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;'>
                                              Sender Name : ".$name."
                                              <br/>
                                              Email : ".$email."
                                              <br/>
                                              Mail for  : ".$subject."
                                              <br/>
                                              Details: ".$message."
                                              <!-- Please click on below link to verify your email: -->
                                          </td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr><td height='28'></td></tr>
                      </table>
                      <table class='flexible' width='600' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'>
                          <tr>
                              <td style='font:12px/16px Arial, Helvetica, sans-serif; color:#797c82; padding:0 0 10px;'>
                                  © Copyright CoderAnnu. All Rights Reserved. 
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
              <!-- fix for gmail -->
              <tr>
                  <td style='line-height:0;'><div style='display:none; white-space:nowrap; font:15px/1px courier;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
              </tr>
          </table>
      </body>
  </html>";
if ($mail->send()){
  header('Location: #');  // Adjust the URL as needed
    exit();
}
      // $mail->send();
      $output = '<div class="alert alert-success"><h5>Thankyou! for contacting us, Well get back to you soon!</h5>
                </div> ';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us Using PHPMailer & Gmail SMTP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
</head>

<body class="bg-info">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 mt-3">
        <div class="card border-danger shadow">
          <div class="card-header bg-danger text-light">
            <h3 class="card-title">Contact Us</h3>
          </div>
          <div class="card-body px-4">
          <form action="#" method="POST" id="contactForm">
              <div class="form-group">
                <?= $output; ?>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject"
                  required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Write Your Message"
                  required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  // Reset the form on successful submission
  if (xhr.status === 200) { // Assuming `xhr` is your XMLHttpRequest object

  document.addEventListener('DOMContentLoaded', function () {
    var contactForm = document.getElementById('contactForm');
    var sendBtn = document.getElementById('sendBtn');
    contactForm.reset();

  });
  }
    if (contactForm && sendBtn) {
      sendBtn.addEventListener('click', function () {
        contactForm.reset();
      });
    }
    </script>
    

</html>