<?php
    session_start();
    if(isset($_POST["submit"]) || isset($_POST["password"])){
        include "config.php";
        $user_email = bin2hex($_POST["userEmail"]);
        $user_password = md5($_POST["password"]);
        $err = array();

        $query = "SELECT * FROM note_user_signup WHERE user_email = '$user_email' AND user_key = '$user_password'";
        $result = mysqli_query($conn,$query) or die('query failed...');
        if(mysqli_num_rows($result) > 0){
            $final_result = mysqli_fetch_assoc($result);
            $id = $final_result["user_key"];
            $_SESSION["final_key"] = $id;
            header("Location:home.php?id=$id");
        }else{
            $err = ["err" => "Please enter valid user name or user key."];
            header("Location:login.php?error");
        }
    }
               
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Login</title>
</head>

<body>
    <main class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="form">
            <p class="logo">Login Here</p>
            <p class="text"> Your Email</p>
            <input type="email" name="userEmail" required>
            <p class="text"> Your Key</p>
            <input type="password" name="password" required>
            <?php
                if(!empty($err)){
                    echo "<p class='err_box'>". $err["err"] ."</p>";
                }
            ?>
            <p class="dummy_text">Don't have an account <a href="signup.php">click here.</a></p>
            <button type="submit" name="submit">Login</button>
        </form>
    </main>
</body>

</html>