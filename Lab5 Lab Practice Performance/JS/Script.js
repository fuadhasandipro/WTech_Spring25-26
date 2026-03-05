console.log("Connected");

function collect_data() {
  let firstname = document.getElementById("firstname").value;
  let lastname = document.getElementById("lastname").value;
  let email = document.getElementById("email").value;
  let phone = document.getElementById("phone").value;
  let message = document.getElementById("message").value;

  let isValid = true;

  if (firstname == "") {
    document.getElementById("err_firstname").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("err_firstname").style.display = "none";
  }

  if (lastname == "") {
    document.getElementById("err_lastname").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("err_lastname").style.display = "none";
  }

  if (email == "") {
    document.getElementById("err_email").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("err_email").style.display = "none";
  }

  if (phone == "") {
    document.getElementById("err_phone").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("err_phone").style.display = "none";
  }

  if (message == "") {
    document.getElementById("err_message").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("err_message").style.display = "none";
  }

  if (isValid == true) {
    console.log("First Name: " + firstname);
    console.log("Last Name: " + lastname);
    console.log("Email: " + email);
    console.log("Phone Number: " + phone);
    console.log("Message: " + message);
  }

  return false;
}
