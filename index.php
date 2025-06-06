<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Coming Soon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-thin-straight/css/uicons-thin-straight.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
</head>
<body>
  <div class="overlay"></div>
  <div class="content">

  <div class="d-flex flex-column flex-md-row align-items-start gap-4">
    <!-- Image on the left -->

    <!-- Countdown + Subscribe on the right -->
    <div class="flex-grow-1">
        <img class="logo" src="assets/images/logo.png" alt="">
          <h1>Coming Soon</h1>
          <p class="lead">We're launching something amazing! Stay tuned.</p>
      <div class="countdown" id="countdown">
        <div class="time-box">
          <span id="days">00</span>
          <small>Days</small>
        </div>
        <div class="time-box">
          <span id="hours">00</span>
          <small>Hours</small>
        </div>
        <div class="time-box">
          <span id="minutes">00</span>
          <small>Minutes</small>
        </div>
        <div class="time-box">
          <span id="seconds">00</span>
          <small>Seconds</small>
        </div>
      </div>

      <div class="subscribe">
        <p class="mt-4">Mazao Reach helps farmers and buyers find each other easily and trade farm produce faster</p>
        <p class="mt-4">Subscribe with your phone number to get launch alerts.</p>
        <form id="subscribeForm" action="backend/subscribe.php" method="POST">
          <input type="tel" id="phoneInput" placeholder="Mobile number" required />
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>
    </div>
        <img class="img-fluid" src="assets/images/illus 1.svg" alt="" style="max-width: 1000px;" />
  </div>
</div>


  <footer>
    <div>© 2025 Mazao Reach. All rights reserved.</div>
    <div>Developed by Smartfy Technologies</div>
  </footer>

  <!-- Theme toggle button -->
  <button id="theme-toggle" aria-label="Toggle theme" title="Toggle light/dark theme" tabindex="0">
    <i class="fi fi-ts-light-mode-alt"></i>
    <img id="theme-icon" src="https://cdn-icons-png.flaticon.com/512/869/869869.png" alt="Toggle theme icon" />
  </button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>
