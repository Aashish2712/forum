<?php

if ($_SERVER['REQUEST_METHOD']== 'POST')
{
  include  "db_con.php";
    $lemail= $_POST['lemail'];
    $lpass= $_POST['lpass'];
    echo $lemail ;
    echo $lpass;
$sql= "SELECT * FROM  `USERS` WHERE uemail= '$lemail' ";
$result=mysqli_query($conn,$sql);
$check = mysqli_num_rows($result);

if($check==1)
{
  $row= mysqli_fetch_assoc($result);
    if(password_verify($lpass,$row['upass']))
    {

      session_start();
      $_SESSION['login']= true;
      $_SESSION['useremail']= $row['uname'];
      $_SESSION['uid']= $row['uid'];
      $log=1;
      
      header("Location:/forum/index.php?log=$log");
    }
    else {
      
      $log=2;
      header("Location:/forum/index.php?log=$log");
    }
  }
  else{
    $log=3;
    header("Location:/forum/index.php?log=$log");
    
  }
  
  
  
  
}
?>