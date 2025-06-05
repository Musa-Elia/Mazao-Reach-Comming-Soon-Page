// Countdown timer logic
const now = new Date();
const launchDate = new Date(now.getTime() + 25 * 24 * 60 * 60 * 1000).getTime();

const timer = setInterval(() => {
  const currentTime = new Date().getTime();
  const distance = launchDate - currentTime;

  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("days").innerText = String(days).padStart(2, '0');
  document.getElementById("hours").innerText = String(hours).padStart(2, '0');
  document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
  document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');

  if (distance < 0) {
    clearInterval(timer);
    document.getElementById("countdown").innerHTML = "<h2 class='text-light'>We're Live! 🎉</h2>";
  }
}, 1000);

// Theme toggle logic
const themeToggleBtn = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');

function setTheme(theme) {
  if (theme === 'light') {
    document.body.classList.add('light-theme');
    themeIcon.src = 'https://cdn-icons-png.flaticon.com/512/414/414825.png';
  } else {
    document.body.classList.remove('light-theme');
    themeIcon.src = 'https://cdn-icons-png.flaticon.com/512/869/869869.png';
  }
  localStorage.setItem('theme', theme);
}

setTheme(localStorage.getItem('theme') || 'dark');

themeToggleBtn.addEventListener('click', () => {
  const current = document.body.classList.contains('light-theme') ? 'light' : 'dark';
  setTheme(current === 'light' ? 'dark' : 'light');
});

// Enforce phone input starting with 255
const phoneInput = document.getElementById('phoneInput');
phoneInput.addEventListener('input', () => {
  if (!phoneInput.value.startsWith('255')) {
    phoneInput.value = '255';
  }
});

// Validate Tanzanian phone number
function isValidTZPhone(phone) {
  return /^255\d{9}$/.test(phone); // Must be 12 digits starting with 255
}

// Handle subscription form submit
document.getElementById('subscribeForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const phone = phoneInput.value.trim();

  if (!isValidTZPhone(phone)) {
    Swal.fire({
      icon: 'error',
      title: 'Invalid Number',
      text: 'Please enter a valid Tanzanian mobile number (12 digits starting with 255).',
      confirmButtonColor: '#f16837'
    });
    return;
  }

  fetch('subscribe.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `phone=${encodeURIComponent(phone)}`
  })
    .then(res => res.json())
    .then(data => {
      if (data.status === 'success') {
        Swal.fire({
          icon: 'success',
          title: 'Subscribed!',
          text: 'You have successfully subscribed to our mailing list.',
          confirmButtonColor: '#58842c'
        });
        document.getElementById('subscribeForm').reset();
        phoneInput.value = '255';
      } else if (data.status === 'exists') {
        Swal.fire({
          icon: 'info',
          title: 'Already Subscribed',
          text: 'This phone number is already in our list.',
          confirmButtonColor: '#58842c'
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: data.message || 'Something went wrong. Please try again.',
          confirmButtonColor: '#f16837'
        });
      }
    })
    .catch(() => {
      Swal.fire({
        icon: 'error',
        title: 'Network Error',
        text: 'Please check your internet connection and try again.',
        confirmButtonColor: '#f16837'
      });
    });
});
