<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'practice_db') or die('conection failed....');
    $key = $_GET["id"];
    $query = "SELECT * FROM note_user_data WHERE id = '$key'";
    $result = mysqli_query($conn, $query);
    $final_result = mysqli_fetch_assoc($result);
?>
<?php 

           
if(isset($_POST["submit"])){
    $note_title = $_POST["title"];
    $note_data = $_POST["note_data"];
    // $key2 = $final_result["id"];
    $query2 = "UPDATE note_user_data SET note_title = '$note_title', note_data = '$note_data' WHERE id = '$key'";
    $final_query3 = mysqli_query($conn, $query2);
    $final_key = $_COOKIE["key"];
    print_r($final_query3);
    header("Location:update.php?id=$key");
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
<section class="data-insert-section2">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input  type="text" name="title" value="<?php echo  $final_result['note_title']; ?>" class="input" placeholder="Title" required>
                <textarea name="note_data" placeholder="Notes" required > <?php echo  $final_result['note_data']; ?> </textarea>
                <button type="submit" name="submit" class="blue">UPDATE NOTE</button>
        </form>
</section>
</body>
</html>

