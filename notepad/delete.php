<?php 
    session_start();
    if($_SERVER["QUERY_STRING"]){
        // delete note data using note id;
        include "config.php";
        $key = $_GET["id"];
        $query = "DELETE FROM note_user_data WHERE id = '$key'";
        $result = mysqli_query($conn, $query);
        $final_key = $_SESSION["final_key"];
        header("Location:home.php?id=$final_key");
    }else{
        echo "empty";
    }

?>