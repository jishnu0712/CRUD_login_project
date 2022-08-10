const username = document.getElementById("username");
const email = document.getElementById("email");
const pwd = document.getElementById("password");
const address = document.getElementById("address");
const phone = document.getElementById("phone");
const highest_education = document.getElementById("highest_education");
const form = document.getElementById("form");
const error = document.getElementById("error");



form.addEventListener("submit", (e) => {
  const messages = [];
  if (username.value === "" || username.value === null) {
    messages.push("Username can't be empty");
  }
  if (email.value === "" || email.value === null) {
    messages.push("Email can't be empty");
  }
  if (pwd.value.length < 3) {
    messages.push("Password must be of length > 3");
  }
  if (pwd.value === "password") {
    messages.push("Password can't be password");
  }
  if (phone.value.length !== 10) {
    messages.push("Phone must be 10 digit long");
  }

  if (messages.length > 0) {
    e.preventDefault();
    error.innerHTML = messages.join(", ");
  }
});
