<!DOCTYPE html>
<html>

<head>
  <title>Admin Login</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      display: inline-block;
      text-align: center;
    }

    input[type="text"],
    input[type="password"] {
      display: block;
      margin: 10px auto;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 300px;
      font-size: 16px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    .error {
      color: red;
    }
  </style>
</head>

<body>
  <?php
  // define variables and set to empty values
  $username = $password = "";
  $errors = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    // Perform validation
    if (empty($username)) {
      $errors[] = "Username is required";
    }
    if (empty($password)) {
      $errors[] = "Password is required";
    }

    // If there are no errors, redirect to the success page
    if (empty($errors)) {
      header("Location: success.php");
      exit();
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
<?php include('adminvalidation.php');?>
  <form method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
    <?php if (!empty($errors) && empty($username))  ?>
      <span class="error"><?php echo $errors[0]; ?></span>
    <?php  ?>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <?php if (!empty($errors) && empty($password))  ?>
      <span class="error"><?php echo $errors[1]; ?></span>
    <?php  ?>

    <input type="submit" value="Login">
  </form>

</body>

</html>
