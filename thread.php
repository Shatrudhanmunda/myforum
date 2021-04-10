<?php

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Welcome to iDiccuss Python</title>
</head>

<body>
    <?php

    include("navbar.php"); ?>

    <div class="container my-4 ">
        <?php
        include 'confi.php';
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id=$id ";
        $retval = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($retval)) {
            $thread_tittle = $row['thread_tittle'];
            $thread_desc = $row['thread_desc'];
            echo ' 
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">' . $thread_tittle . '</h4>
    <p>' . $thread_desc . '</p>
    <hr>

    <p class="mb-0"><b>Note-</b>No Spam / Advertising / Self-promote in the forums. ...
    Do not post copyright-infringing material. ...
    Do not post “offensive” posts, links or images. ...
    Do not cross post questions. ...
    Do not PM users asking for help. ...
    Remain respectful of other members at all times..</p>
    <p class="my-4"><b>Posted by Shatru</b></p>
</div>

';
        }
        ?>
        <!--
<?php


include 'confi.php';
$id = $_GET['threadid'];
$sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ";
$noResult = true;
$retval = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($retval)) {
    $noResult = false;
    $tittle = $row['thread_tittle'];
    $thread_desc = $row['thread_desc'];

    echo ' 

<div class="d-flex my-3">
    <div class="flex-shrink-0">
        <img src="img/image.jpg" width="54px" alt="...">
    </div>
    <div class="flex-grow-1 ms-3">
        <h5><a href="thread.php?threadid=' . $id . '" class="text-dark">' . $tittle . '</a></h5>
        ' . $thread_desc . '
    </div>
</div>
';
}

?>
 <?php
        session_start();

        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            $th_id=$_GET['catid'];
            $comment_content = $_POST['tittle'];
            $id=$_SESSION['sno'];
            
          
           $sql="INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) 
           VALUES ('$comment_content', '$th_id', '$id', CURRENT_TIMESTAMP);";
            $ret = mysqli_query($conn, $sql);
        } else {
            echo "error1";
        }
        ?>
-->
<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
    <h4>Comment a Post</h4>
    <form action="'.$_SERVER["REQUEST_URI"].' " method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Type your comment</label>
            <input type="text" class="form-control" id="tittle" name="tittle" aria-describedby="emailHelp">
            <input type="hidden" name="sno" value="'.$_SESSION["sno"].'"> 
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>';
}
else{
echo '<div class="container">
<p class="lead">You are not logged ! Please log in to start diccussion</p>
</div>  ';
}
?>
     
<div class="container">
<h3 class="my-3">Diccussion</h3>
<?php
include 'confi.php';
$id = $_GET['threadid'];
$sql = "SELECT * FROM `comment`";
$noResult = true;
$retval = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($retval)) {
    $noResult = false;
   // $th_id=$row['thread_id'];
    $tittle = $row['comment_content'];
    $comment_time = $row['comment_time'];
    $thread_user_id = $row['comment_by'];
    $sql2 = "SELECT user_name FROM `users` WHERE user_id=$thread_user_id ";
   // $noResult = true;
    $retval2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($retval2);
    $user_name=$row2['user_name'];
    
    
    echo ' 
            
            <div class="d-flex my-3">

<div class="flex-shrink-0">
<img src="img/image.jpg" width="54px" alt="...">
</div>
<div class="flex-grow-1 ms-3">
<h5>'.$user_name.'</h5>
' . $tittle . '
</div><p class="font-weight-bold my-0" >comment By :'.$user_name.' at '.$comment_time.'</p>
</div>';
}
if ($noResult) {
    echo '<div class="alert alert-success" role="alert">
<h4 class="alert-heading">No result Found</h4>
<p>Be the first person to ask a question..</p>

</div>';
}

?>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <?php

    include("footer.php");
    ?>
</body>

</html>