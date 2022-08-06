<?php
    if(isset($_POST["submit"])){
        include "config.php";
        $user_name = bin2hex($_POST["userName"]);
        $user_email = bin2hex($_POST["userEmail"]);
        $user_password = md5($_POST["password"]);
        $query = "INSERT INTO note_user_signup(user_name, user_email, user_key) VALUES ('$user_name', '$user_email','$user_password')";
        $result = mysqli_query($conn,$query) or die('query failed...');
        header('Location:login.php?SignupSucessfull');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>SignUp</title>
</head>

<body>
    <main class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form">
            <p class="logo">Creat an account</p>
            <p class="text">Full Name</p>
            <input type="text" name="userName" required>
            <p class="text"> Your Email</p>
            <input type="email" name="userEmail" required>
            <p class="text"> Creat Key</p>
            <input type="password" name="password" required>
            <p class="dummy_text">Already have an account <a href="login.php">login here.</a></p>
            <button type="submit" name="submit">Creat Account</button>
        </form>
    </main>
</body>

</html>