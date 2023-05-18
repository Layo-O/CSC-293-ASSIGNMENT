<?php
  function resources($type, $rel, $href) {
    echo "<link rel='{$rel}' type='{$type}' href='{$href}' />";
  }
?>
<?php resources("text/css", "stylesheet", "style.css?<?=filemtime('style.css')?>"); ?>

<html lang="en">
<head>
  <title>Form</title>
  <!-- <link rel="stylesheet" href="./style.css"> -->
</head>
<body>
<div class="container">
  <form action="index.php" id="phpForm" method="post">
  <img src="oluwaseun.jpg" alt="passport">
  <h1>PHP FORM</h1>
  <div class="form-field">
  <label for="name">Name:</label>
   <input type="text" name="name" id="name">
   <div class="error" id="name-error"></div>
  </div>

    <div class="form-field">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <div class="error" id="email-error"></div>
    </div>

    <div class="form-field">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <div class="error" id="password-error"></div>
    </div>

    <div class="form-field">
    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" id="phone">
    <div class="error" id="phone-error"></div>
    </div>

    <div class="form-field">
    <label for="gender">Gender:</label>
    <label for="male">Male</label>
    <input type="radio" name="gender" id="male" value="male">
    <label for="female">Female</label>
    <input type="radio" name="gender" id="female" value="female">
    <label for="others">Others</label>
    <input type="radio" name="gender" id="others" value="others">
    <div class="error" id="gender-error"></div>
    </div>
    
    <div class="form-field">
       <label for="language">Language:</label>
       <select name="language" id="language">
        <option value="">Select Language</option>
        <?php require 'language.php' ?>
     </select>
    <div class="error" id="language-error"></div>

    <div class="form-field">
      <label for="zip">Zip Code:</label>
      <input type="number" id="zip" name="zip">
      <div class="error" id="zip-error"></div>
    </div>
  
    <div class="form-field">
      <label for="about">About:</label>
      <textarea name="about" id="about" cols="30" rows="2" placeholder="write about yourself"></textarea>
      <div class="error" id="about-eror"></div>
    </div> 

    <div class="form-field">
      <button class="register" onclick="validateForm">Register</button>
    </div>
  </form>
</div>
</body>
</html>

<?php 
  require "connect.php";
  $name = $email = $password = $phone = $gender = $language = $zip = $about = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $language = $_POST["language"];
    $gender = $_POST["gender"];
    $zip = $_POST["zip"];
    $about = $_POST["about"];
  }

  

  $sql = "INSERT INTO form_tb (name, email, password, phone_no, gender, language, zip_code, about)
    VALUES ('$name', '$email', '$password', '$phone', '$gender', '$language', '$zip', '$about')";

if (mysqli_query($conn, $sql)) {
  echo '<script>
            var notification = document.createElement("div");
            notification.textContent = "Data saved successfully!";
            notification.classList.add("notification");
            document.body.appendChild(notification);
            
            setTimeout(function() {
              notification.style.display = "none";
            }, 5000);
          </script>';
} else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
<?php

?>












