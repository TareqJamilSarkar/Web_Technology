function validateName() {
  let fname = document.getElementById("first-name").value;
  if (fname === "" || fname.length < 3) {
    document.getElementById("name-error").innerHTML =
      "Please enter a valid name (min 3 characters)";
    return false;
  }
  return true;
}
document.getElementById("first-name").addEventListener("", function () {
  document.getElementById("name-error").innerHTML = "";
});

function validateEmail() {
  let email = document.getElementById("email").value;
  if (email === "") {
    document.getElementById("email-error").innerHTML = "Email is required.";
    return false;
  }
  return true;
}

document.getElementById("email").addEventListener("input", function () {
  document.getElementById("email-error").innerHTML = "";
});

function validateDOB() {
  let dob = document.getElementById("dob").value;
  if (dob === "") {
    document.getElementById("dob-error").innerHTML =
      "Date of birth is required.";
    return false;
  }
  return true;
}

document.getElementById("dob").addEventListener("input", function () {
  document.getElementById("dob-error").innerHTML = "";
});

function validate() {
  if (!validateName() || !validateDOB() || !validateEmail()) {
    return false;
  }
}
document.querySelector("form").addEventListener("submit", function (e) {
  if (!validate()) {
    e.preventDefault();
  }
});
