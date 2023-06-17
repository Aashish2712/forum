<?php
session_start();
require"parts/db_con.php";
echo '<nav class="navbar navbar-expand-lg" style="background-color:#01f7f7;">
<div class="container-fluid">
    <a class="navbar-brand" href="/forum">Coder Bench</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <div class="container-fluid">
      <ul class="navbar-nav ">
      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button"
      data-bs-toggle="dropdown" aria-expanded="false">Top Categories
      </a>
      <ul class="dropdown-menu">';
     $sql = "SELECT cat_name,cat_id FROM `categories`LIMIT 3";
     $result= mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
       
        $catid=$row['cat_id'];

      echo' 
       <li><a class="dropdown-item text-center" href="threadlist.php?catid='. $catid. ' ">'. $row['cat_name'] .'</a></li>
       
       ';
      }
      
      
      echo '</ul>
      <li class="nav-item">
      <a class="nav-link" href="/forum/about.php">About</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="/forum/contact.php">Contact </a>
      </li>
      </ul>
      </div>
      
      
      <form class="d-flex navbar-right " role="search" action="search.php" method="get">
      <input class="form-control me-2 mx-2" name="search" type="search"
      placeholder="Search" aria-label="Search">
      <button class="btn btn-success " type="submit">Search</button>
      </form>';
      if(isset($_SESSION['login']) && $_SESSION['login']==true){
        echo' <a href="parts/logout.php" class="btn btn-warning mx-2">Logout </a> ';
      }
      else {
        
        echo' 
        <div class="mx-2 d-flex">
        <button type="button" class="btn btn-warning ml-4 my-1"
        data-bs-toggle="modal" data-bs-target="#loginmodal">login</button>
        <button type="button" class="btn btn-warning my-1 me-2"
        data-bs-toggle="modal" data-bs-target="#signupmodal">signup</button>';
      }
       echo' </div>
      </div>
    </div>
  </nav>';
  include 'parts/loginmodal.php';
  include 'parts/signupmodal.php';
// for signup form 
  
 if (isset($_GET['sig'])){
  
  $sig=$_GET['sig'];
  if($sig==1){
    echo' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Invalid entry</strong> Email is already Registered !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  elseif($sig==2){
    echo' <div class="alert alert-danger  alert-dismissible fade show my-0" role="alert">
    <strong>Invalid entry </strong> Password not match !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  elseif($sig==3){
    echo' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Invalid entry!</strong> Try again later :
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  elseif($sig==4){
    echo' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>success !</strong> Your email is successfully registered :
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
}

if (isset($_GET['lout']) && $_GET['lout']==true){

  echo'<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>logout  successfully  !</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}




  

//for login form 

  if (isset($_GET['log'])  &&  isset($_SESSION['login']) ){
    
    $log=$_GET['log'];
    
    if($log==1){
      echo' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>login success  !</strong> Welcome '. $_SESSION['useremail'] .' :
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  }
  
  
  
  if (isset($_GET['log'])){
    $log=$_GET['log'];
      
      if($log==2){
        echo' <div class="alert alert-danger  alert-dismissible fade show my-0" role="alert">
        <strong>Invalid entry </strong> Password not match !!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      elseif($log==3){
        echo' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Invalid entry!</strong> Email is not registered :
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
    
  
  
   
  
  
  
  ?>