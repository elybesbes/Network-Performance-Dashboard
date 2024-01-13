<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Network Performance Dashboard</title>
</head>
<body>
    <div class="sidendcontent">
    <div class="content">
        <nav class="sidebar-customer">
          <ul>
            <li><a href="home.html"><img src='images/home.png' alt="Home" />Home</a></li>
            <li><a href="customers.php"><img src='images/customer.png' alt="Customers" />Customers</a></li>
            <li><a href="dashboard.html"><img src='images/dashboard.png' alt="Dashboard" />Dashboard</a></li>
            <li><a href="contact.php"><img src='images/contact.png' alt="Dashboard" />Contact</a></li>
        </nav>
    </div>
    <div class="app">
        <header class="header">
          <div class="logo">
            <a href="https://www.huawei.com/en/" target="_blank"><img src='images/huawei.png' alt="Huawei Logo" /></a>
          </div>
          
          <div class="title"> 
        <h1 class="page-title">Network Performance Dashboard</h1>
        </div>
          <div class="auth">
            <img src='images/login.png' alt="Login" />
          </div>
        </header>
        <div class="divider"></div>
        <div class="contact-container">
          <h2>Contact Us</h2>
          <form class="contact-form" method="post">
              <input type="text" name="firstName" placeholder="First Name" required>
              <input type="text" name="lastName" placeholder="Last Name" required>
              <input type="email" name="email" placeholder="Email" required>
              <input type="text" name="phoneNumber" placeholder="Phone Number"required>
              <textarea name="message" placeholder="Message" rows="4" required></textarea>
              <button value='send' type="submit" class="submit">Submit</button>
          </form>
          <div class="social-icons">
              <a href="https://www.facebook.com/search/top?q=huawei%20tunisie" target="_blank"><img src="images/Facebook.png" alt="Facebook"></a>
              <a href="https://www.instagram.com/huawei/" target="_blank"><img src="images/Linkedin.png" alt="LinkedIn"></a>
              <a href="https://www.linkedin.com/company/huawei/mycompany/verification/" target="_blank"><img src="images/Instagram.png" alt="Instagram"></a>
          </div>
      </div>

    </div>
    <footer>
      <p>&copy; 2023 Huawei. All rights reserved. | Developed by Elyes Besbes - Summer Internship 2023 -
        <a href="https://www.facebook.com/elyes.besbes.7/" target="_blank" class="footerimg"><img src='images/Facebook-me.png' alt="FB" /></a>
        <a href="https://www.instagram.com/ely__bes/?hl=fr" target="_blank" class="footerimg"><img src='images/Instagram-me.png' alt="INST" /></a>
        <a href="https://www.linkedin.com/in/elyes-besbes-ict-engineer/" target="_blank" class="footerimg"><img src='images/LinkedIn-me.png' alt="LN" /></a>
      </p>
    </footer>
    </body>
    </html>
    
<?php

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\Exception;
use phpmailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $phoneNumber = $_POST["phoneNumber"];
  $message = $_POST["message"];

  $mail = new PHPMailer(true);

  try {
      // Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com'; // Your SMTP server hostname
      $mail->Port = 587; // Your SMTP server port
      $mail->SMTPAuth = true;
      $mail->Username = 'llass7553@gmail.com'; // Your SMTP username
      $mail->Password = 'gfuhdpnuqtreamgm'; // Your SMTP password

      // Recipients
      $mail->setFrom($email, $firstName . ' ' . $lastName);
      $mail->addAddress('llass7553@gmail.com'); // Recipient email address

      // Content
      $mail->Subject = 'Contact Form Submission - Dashboard';
      $mail->Body = "Name: $firstName $lastName\n"
                  . "Email: $email\n"
                  . "Phone Number: $phoneNumber\n\n"
                  . "Message:\n$message";

      $mail->send();
      echo '<p class="sucess-msg">Message has been sent</p>';
  } catch (Exception $e) {
      echo '<p class="failure-msg">Message could not be sent. Error:</p>', $mail->ErrorInfo;
  }
}
?>
