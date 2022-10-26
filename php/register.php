<?php
if (isset($_POST['submit'])) {

  if (empty($_POST['fullname'])) {
    dangerAlert("Error!", "Fullname cannot be empty!");
    echo "<br>";
  }else {
     $username = htmlspecialchars($_POST['fullname']);
  }
  if (empty($_POST['email'])) {
    dangerAlert("Error!", "Email cannot be empty!");
    echo "<br>";
  }else {
     $email = htmlspecialchars($_POST['email']);
  }
  if (empty($_POST['password'])) {
    dangerAlert("Error!", "Password cannot be empty!");
  }else {
     $password = htmlspecialchars($_POST['password']);
  }

  registerUser($username, $email, $password);
}

function registerUser($username, $email, $password)
{
    //save data into the file

    $userDetails = [$username, $email, $password];

    $details = fopen('../storage/users.csv', 'r');

    $readDetails = fgetcsv($details);
    if ($readDetails == $userDetails) {
        warningAlert("Registration Failed!", "User already exists!");
    } else {
        $details = fopen('../storage/users.csv', 'w');
        fputcsv($details, $userDetails);
        fclose($details);
        successAlert("Success!", "User Successfully registered!");
    }
  
}

function successAlert($bold, $message)
{
    echo '<div class="alert alert-success justify-content-center d-flex align-items-center w-50 m-auto" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"></use></svg>
      <div>
        <strong>' . $bold . '</strong> ' . $message . ' <a href="../forms/login.html" class="alert-link">Click here to login</a>
      </div>
    </div>';
}

function warningAlert($bold, $message)
{
    echo '<div class="alert alert-warning justify-content-center d-flex align-items-center w-50 m-auto" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"></use></svg>
      <div>
        <strong>' . $bold . '</strong> ' . $message . ' <a href="../forms/register.html" class="alert-link">Click here to register or reset password</a>
      </div>
    </div>';
}

function dangerAlert($bold, $message)
{
    echo '<div class="alert alert-danger justify-content-center d-flex align-items-center w-50 m-auto" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"></use></svg>
      <div>
        <strong>' . $bold . '</strong> ' . $message . ' <a href="../forms/register.html" class="alert-link">Click here to go back</a>
      </div>
    </div>';
}
//echo "HANDLE THIS PAGE";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
   

</body>

</html>