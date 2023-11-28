<?php
session_start();
//var_dump("lllll");
// define variables and set to empty values
$nameValidationError = $phoneValidationError = $postcodeValidationError = $addressValidationError = $cityValidationError = $provinceValidationError = $emailValidationError = $cnameValidationError = $ccnumValidationError = $expmonthValidationError = $expyearValidationError = $passwordValidationError = $confirmPasswordValidationError = "";
$name = $phone = $postcode = $address = $city = $province = $email = $cname = $ccnum = $expmonth = $expyear = $password = $confirmPassword = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  var_dump("llllyyyl");
  if (empty($_POST["name"])) {
    $nameValidationError = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Validate name (only letters and spaces allowed)
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameValidationError = "Only letters and spaces allowed";
    }
  }

  if (empty($_POST["phone"])) {
    $phoneValidationError = "phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // Validate phone number
    if (!preg_match('/^\d{10}$/', $phone)) {
      $phoneValidationError = "Invalid phone number";
    }
  }

  if (empty($_POST["postcode"])) {
    $postcodeValidationError = "post code is required";
  } else {
    $postcode = test_input($_POST["postcode"]);
  }

  if (empty($_POST["address"])) {
    $addressValidationError = "address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["city"])) {
    $cityValidationError = "city is required";
  } else {
    $city = test_input($_POST["city"]);
  }


  if (empty($_POST["province"])) {
    $provinceValidationError = "province is required";
  } else {
    $province = test_input($_POST["province"]);
  }

  if (empty($_POST["address"])) {
    $addressValidationError = "address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["email"])) {
    $emailValidationError = "email is required";
  } else {
    $email = test_input($_POST["email"]);
    // Validate email
    if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/", $email)) {
      $emailValidationError = "Invalid email address";
    }
  }

  if (empty($_POST["cname"])) {
    $cnameValidationError = "cname is required";
  } else {
    $cname = test_input($_POST["cname"]);
  }

  if (empty($_POST["ccnum"])) {
    $ccnumValidationError = "ccnum is required";
  } else {
    $ccnum = test_input($_POST["ccnum"]);
    // Validate credit card number
    if (!preg_match('/^\d{4}-\d{4}-\d{4}-\d{4}$/', $ccnum)) {
      $ccnumValidationError = "Invalid credit card number";
    }
  }

  if (empty($_POST["expmonth"])) {
    $expmonthValidationError = "expmonth is required";
  } else {
    $expmonth = test_input($_POST["expmonth"]);
    // Validate month
    if (!preg_match('/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/', $expmonth)) {
      $expmonthValidationError = "Invalid month";
    }
  }

  if (empty($_POST["expyear"])) {
    $expyearValidationError = "expyear is required";
  } else {
    $expyear = test_input($_POST["expyear"]);
    // Validate month
    if (!preg_match('/^\d{4}$/', $expyear)) {
      $expyearValidationError = "Invalid Year";
    }
  }

  if (empty($_POST["password"])) {
    $passwordValidationError = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["confirmPassword"])) {
    $confirmPasswordValidationError = "confirmPassword is required";
  } else {
    $confirmPassword = test_input($_POST["confirmPassword"]);
    //compare 'Password' and 'Confirm Password'
    if ($password !== $confirmPassword) {
      $confirmPasswordValidationError = "Passwords do not match";
    }
  }


  $_SESSION['formData'] = [
    'name' => $name,
    'phone' => $phone,
    'postcode' => $postcode,
    'address' => $address,
    'city' => $city,
    'province' => $province,
    'email' => $email,
    // Add other form fields as needed
  ];
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (empty($nameValidationError) && empty($phoneValidationError) && empty($postcodeValidationError) && empty($addressValidationError) && empty($cityValidationError) && empty($provinceValidationError) && empty($emailValidationError) && empty($cnameValidationError) && empty($ccnumValidationError) && empty($expmonthValidationError) && empty($expyearValidationError) && empty($passwordValidationError) && empty($confirmPasswordValidationError)) {
  // If all validations pass, generate the receipt
  // Access cart details from the session
  
}


echo "<script>
  function openPopupWindow() {
      window.open('receipt.php', '_blank', 'width=600,height=600');
  }
</script>";
