 document.getElementById("registerForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const age = document.getElementById("age").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;

  if (!name || !age || !email || !password) {
    alert("Please fill in all fields.");
    return;
  }

  let users = JSON.parse(localStorage.getItem("userData")) || [];
  users.push({ name, age, email, password });
  localStorage.setItem("userData", JSON.stringify(users));

  // Redirect ke login
  window.location.href = "login.html";
});