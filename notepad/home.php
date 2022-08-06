<?php
    session_start();
    if(!isset($_SESSION["final_key"])){
        header("Location:login.php");
    }else{
    // save data in database(insert data);
    include "config.php";
    if(isset($_POST["submit"])){
        $note_title = $_POST["title"];
        $note_data = $_POST["note_data"];
        $final_key = $_POST["hidden_key"];
        $creat_date = date("Y:m:d")." ".date("h:m:s"); 
        $query2 = "INSERT INTO note_user_data (note_title, note_data, note_key, creat_date) VALUES ('$note_title', '$note_data', '$final_key', '$creat_date')";
        if($final_query = mysqli_query($conn, $query2)){
            $_SESSION["final_key"] = $final_key;
            header("Location:home.php?id=$final_key");
        }else{
            header("Location:login.php");
        }
      
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Note Pad</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="left-nav-items">
                <div class="burger">
                    <div class="burger-items"></div>
                    <div class="burger-items"></div>
                    <div class="burger-items"></div>
                </div>
                <h2 class="logo">ALL NOTES</h2>
            </div>
            <div class="right-nav-items">
                <input type="text" id="input" placeholder="Search Notes...">
            </div>
        </nav>
    </header>

    <main>
        <section class="container">
            <?php
                $key = $_GET["id"];
                $query = "SELECT * FROM note_user_data WHERE note_key = '$key'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){
                    while ($final_result = mysqli_fetch_assoc($result)) {
            ?>
               <a href="update.php?id=<?php echo $final_result['id']?>" class="link">
               <div class="note-box">
                    <h4 class="note-title">
                        <?php echo $final_result['note_title']?>
                    </h4>
                    <p class="note-data">
                        <?php echo $final_result['note_data']?>
                    </p>
                    <div class="time"> <p>Last Modified:
                        <?php echo $final_result['creat_date']?> </p> <a href="delete.php?id=<?php echo $final_result['id']?>"><button>DELETE</button></a>
                    </div>
                </div>
               </a>
                <?php   }}; ?>
        </section>
        <section class="data-insert-section">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input  type="text" name="title" class="input" placeholder="Title" required>
                <textarea name="note_data" placeholder="Notes" required></textarea>
                <button type="submit" name="submit" class="blue">SAVE NOTE</button>
                <input type="text" class="hidden" name="hidden_key" value="<?php echo $key ?>" placeholder="Title" hidden>

            </form>
            <button class="red">CANCEL</button></a>
        </section>
        <button id="add_note_btn">+</button>
    </main>
<?php
    }
    ?>
    <script src="js/script.js"></script>
</body>

</html>