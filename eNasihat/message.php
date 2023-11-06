<?php
include 'database.php';
//$conn = mysqli_connect("localhost", "root", "", "enasihat") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

$check_data = "SELECT replies, link FROM chatbot WHERE '$getMesg' REGEXP CONCAT('[[:<:]]', queries, '[[:>:]]')";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay and link from the database according to the user query
    sleep(rand(2, 4));
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay and link to variables which we'll send to ajax
    $reply = $fetch_data['replies'];
    $link = $fetch_data['link'];

    //inserting user and chatbot messages into chats table
    $insert_query = "INSERT INTO chats ( user, chatbot) VALUES ( '$getMesg', '$reply')";
    mysqli_query($conn, $insert_query);

    //checking if link is not empty or null
    if (!empty($link)) {
      //appending link to reply with HTML formatting
      $reply .= " - <a href='$link'>$link</a>";
    }

    

    //echoing reply with or without link
    echo $reply;
}else{
    echo "Maaf saya tidak mempunyai sebarang jawapan untuk pertanyaan anda, cuba frasa semula. Terima kasih!";
}

?>