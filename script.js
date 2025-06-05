// Set launch date to 25 days from now
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
    themeIcon.src = 'https://cdn-icons-png.flaticon.com/512/414/414825.png'; // sun icon
  } else {
    document.body.classList.remove('light-theme');
    themeIcon.src = 'https://cdn-icons-png.flaticon.com/512/869/869869.png'; // moon icon
  }
  localStorage.setItem('theme', theme);
}

// Load saved theme or default to dark
const savedTheme = localStorage.getItem('theme') || 'dark';
setTheme(savedTheme);

// Theme toggle click event
themeToggleBtn.addEventListener('click', () => {
  const currentTheme = document.body.classList.contains('light-theme') ? 'light' : 'dark';
  const newTheme = currentTheme === 'light' ? 'dark' : 'light';
  setTheme(newTheme);
});

// Force phone input to start with 255
const phoneInput = document.getElementById('phoneInput');
phoneInput.addEventListener('input', () => {
  if (!phoneInput.value.startsWith('255')) {
    phoneInput.value = '255';
  }
});