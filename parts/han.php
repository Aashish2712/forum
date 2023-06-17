<?php
if ($_SERVER['REQUEST_METHOD']== 'POST')
{
  include  "db_con.php";
    $uname=$_POST['sname'];
    $uemail= $_POST['semail'];
    $pass= $_POST['spassword'];
    $cpass= $_POST['scpassword'];
    
    // checking the user 
    $sqlexist=" SELECT * from `users` where uemail='$uemail'";
    $result=mysqli_query($conn,$sqlexist);
    $check = mysqli_num_rows($result);
    if($check > 0 ){
       $sig=1;
      header("Location:/forum/index.php?sig=$sig");
    }
    // confirming password 
    elseif($pass!=$cpass){
      $sig=2;
      header("Location:/forum/index.php?sig=$sig");
    }
    else{
      $hash=password_hash($pass,PASSWORD_DEFAULT);
      $sql="INSERT INTO `users`(`uname`,`uid`, `uemail`, `upass`, `tm`) VALUES ('$uname',NULL,'$uemail','$hash',current_timestamp())";
      $result=mysqli_query($conn,$sql);
      if($result){
        $sig=4;
        header("Location:/forum/index.php?sig=$sig");
        exit();
      }
      else{
        $sig=3;
        header("Location:/forum/index.php?sig=$sig");
       
        
      }

    }
}



?>