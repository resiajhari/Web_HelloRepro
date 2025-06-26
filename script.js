function goToLogin() {
  window.location.href = "login.html";
}

function goToRegister() {
  window.location.href = "register.html";
}
function goToHome() {
  window.location.href = "index.html"; // arahkan ke landing
}

function logIn() {
  const email = document.getElementById("logEmail").value; 
  const pass = document.getElementById("logPass").value;

  const users = JSON.parse(localStorage.getItem("users") || "[]");
  const user = users.find(u => u.email === email && u.pass === pass);

  if (user) {
    alert("Welcome, " + user.name + "!");
    window.location.href = "dashboard.html"; // pindah ke dashboard
  } else {
    alert("Invalid email or password.");
  }
}