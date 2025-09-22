<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ToGoHub — Move Smarter</title>
  <link rel="icon" href="./images/TGH-icon.png" type="image/png">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <link rel="stylesheet" href="./header.css" />
  <link rel="stylesheet" href="./footer.css">
  <link rel="stylesheet" href="./styles.css">
  <link rel="stylesheet" href="./login.css">
  <link rel="stylesheet" href="./signup.css">
  <link rel="stylesheet" href="./pay.css">
  <link rel="stylesheet" href="./hire.css">
</head>

<body>
  <header>
    <div class="container topnav" id="topnav">
      <nav>
        <div class="logo">
          <a href="./">
            <img src="./images/TGH-logo.png" alt="" />
          </a>
        </div>
        <ul class="menu">
          <li><a href="./">Home</a></li>
          <li><a href="">About</a></li>
          <li class="dropdown">
            <button class="dropbtn">Services ▾</button>
            <div class="dropdown-content">
              <a href="">Booking</a>
              <a href="">Register</a>
              <a href="">Manage Fleet</a>
              <a href="">E-Commerce</a>
              <a href="">Get Shop</a>
            </div>
          </li>
          <li class="dropdown">
            <button class="dropbtn">Account Settings ▾</button>
            <div class="dropdown-content">
              <a href="">My ID</a>
              <a href="">Wallet Balance</a>
              <a href="">Card Balance</a>
              <a href="">Available Ticket</a>
              <a href="">Manage</a>
            </div>
          </li>
          <li><a href="./signup">Create Account</a></li>
          <li><a href="">Transaction History</a></li>
          <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="./">Sign Out</a></li>
          <?php else: ?>
            <li><a href="./login">Sign In</a></li>
          <?php endif; ?>
          <li><a href="">Alert</a></li>
          <li><a href="">Notification</a></li>


        </ul>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </nav>
    </div>
  </header>