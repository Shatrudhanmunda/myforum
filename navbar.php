<?php

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iDicuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">Contact</a>
        </li>
      
      </ul>';
      session_start();
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
          echo ' <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
          <p class="text-light mx-2 my-0">'.$_SESSION['userid'].'</p>
         <a href="logout.php"  class="btn btn-outline-success mx-2" >LogOut</a>
         
        </form>';
}else{
  echo '<form class="d-flex">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-success" type="submit">Search</button>
 
</form>
<button class="btn btn-outline-success mx-2"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
<button class="btn btn-outline-success ml-2"  data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
}
echo '
</div>
</div>
</nav>'; 
    
include("login.php");
include 'signup.php';
// if(isset($_GET['$signupsuccess']) && $_GET['$signupsuccess']=="true"){
// echo "yes";
// }
// else{
//   echo "error";
// }


?>
