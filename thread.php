<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,
      initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous" />

    <title>Coder Bench</title>
</head>

<body>
    <?php require "parts/nav.php";?>
    <?php  require"parts/db_con.php"; ?>



    <?php
     $th_id=$_GET['th_id'];

$method=  $_SERVER['REQUEST_METHOD'];
$showresult = false ;
if($method=='POST')
{
     $com_content=$_POST['com_content'];
     $uid = $_SESSION['uid'];
     $com_content=str_replace("<","&lt;",$com_content);
     $com_content=str_replace(">","&gt;",$com_content);
     
     $sql="INSERT INTO `comments` (`com_id`, `com_content`, `th_id`, `com_time`,`uid`) VALUES (NULL, '$com_content ', '$th_id',current_timestamp(),'$uid')";
     $result=mysqli_query($conn,$sql);
      if ($result){

           $showresult = true ;
           echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success !</strong> Your comments  is submitted sucessfully           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           
         </div>';
          }

}
?>







    <?php      
     
                // for fetcting threads
            $sql="SELECT * FROM `thread` WHERE th_id=$th_id";
            $result=mysqli_query($conn,$sql);
            $no_th=true;
            while($row=mysqli_fetch_assoc($result))
                {
                    
                    
            
                $th_title= $row['th_title'];
                $th_desc= $row['th_desc'];
                $th_uid = $row['uid'];


                $sql2="SELECT * FROM `users` where uid=$th_uid";
                $result2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($result2);
                $un=$row2['uname'];


                echo '<div class="container my-4 h-100 p-5 text-dark" style="background-color: #e3f2fd;">
                <div class="jumbotron ">
                     <h5 class="display-4"><strong> '. $th_title .'</strong></h5>
                     <p class="lead"><strong>'. $th_desc .'</strong></p>
                     <hr class="my-4">
                     <p><strong>Posted by :- '. $un  .'</strong> 
                    </p>
                     </div>
                     </div>
                     
                     ';
                    }
                   
                    ?>

<?php

if(isset($_SESSION['login']) && $_SESSION['login']==true){
echo' <div class="container">
        <h1 class="py-2">Comments </h1>
        <form action="'. $_SERVER['REQUEST_URI'].'" method="post">

            <div class="form-group mt-3">
                <label for="exampleFormControlTextarea1">Post your comments </label>
                <textarea class="form-control mt-2" id="com_content" name="com_content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-2">Post comment </button></button>
        </form>
    </div>';

}
else{
        
    echo '<div class= "container"> <h1 class="py-2">Comments </h1>
    <p class="lead"><strong>To post your comments please login.</strong></p>
    </div>';

}

?>




    <div class="container mt-3">

        <h1> Discussions </h1>
        <?php 

$sql="SELECT * FROM `comments` WHERE th_id =$th_id";
$result=mysqli_query($conn,$sql);
$noresult=true ;
while($row=mysqli_fetch_assoc($result)){
     $noresult=false ;
     $no_th=false;
       

$com_content= $row['com_content'];
$comment_by= $row['comment_by'];
$com_time= $row['com_time'];
$co_uid=$row['uid'];




$sql2="SELECT * FROM `users` where uid=$co_uid";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$unc=$row2['uname'];

    echo' <div class="media">
          <img src="parts/img/user.jpeg" width="50px" class="mr-3" alt="...">
          <div class="media-body">
          <p>'.$com_content.'</p>
          </div><p class="fw-bold my-0">'. $unc.' at '. $com_time  .'</p>
               
     </div>';
}
   if($no_th){
                        echo '<div class="jumbotron jumbotron-fluid"  style="background-color: #e3f2fd;">
                        <div class="container">
                          <p class="display-4"> No Comments found  </p>
                          <p class="lead">Be The First person to ask an question .</p>
                        </div>
                      </div>';}
                      ?>

    </div>


    <?php include "parts/footer.php";?>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    -->
</body>

</html>