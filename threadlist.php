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
     $id=$_GET['catid'];

$method=  $_SERVER['REQUEST_METHOD'];
$showresult = false ;
if($method=='POST')
{    $uid = $_SESSION['uid'];
     $th_title=$_POST['th_title'];
     $th_desc=$_POST['th_desc'];

     $th_title=str_replace("<","&lt;",$th_title);
     $th_title=str_replace(">","&gt;",$th_title);

     $th_desc=str_replace("<","&lt;",$th_desc);
     $th_desc=str_replace(">","&gt;",$th_desc);

     $sql="INSERT INTO `thread` ( `th_title`, `th_desc`,`uid`, `cat_id`, `th_tstamp`) VALUES ( '$th_title', '$th_desc','$uid' ,'$id', current_timestamp())";
     $result=mysqli_query($conn,$sql);
      if ($result){

           $showresult = true ;
           echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success !</strong> Your thread is submitted sucessfully           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
          }

}
?>







    <?php
   
               // for fetcting categories
               $sql="SELECT * FROM `categories`WHERE cat_id=$id";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_assoc($result);
               //     echo $row['cat_sno'];
               
               $catn = $row['cat_name'];
               $catd = $row['cat_desc'];
    echo '<div class="container my-4 h-100 p-5 text-dark" style="background-color: #e3f2fd;">
     <div class="jumbotron ">
          <h1 class="display-4"><strong>welcome to '. $catn .' Forum</strong></h1>
          <p class="lead"><strong>'. $catd .'</strong></p>
          <hr class="my-4">
          <p>This forum is for sharing knowledge with each other.
          </p>
          <p><strong>
          Forum Rules<br>
          1. No Spam / Advertising / Self-promote in the forums
          <br>
          2. Do not post copyright-infringing material<br>
          3. Do not post “offensive” posts, links or images<br>
          4. Remain respectful of other members at all times</strong>
          </p>
          <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
     </div>
     </div>';
     ?>
      <!-- form for taking threads  -->
      <?php
       if(isset($_SESSION['login']) && $_SESSION['login']==true){
    
      echo'
    <div class="container">
        <h1 class="py-2">Start a Discussion </h1>
        <form action="'. $_SERVER['REQUEST_URI'] .'" method="post">
        <div class="form-group mt-3">
        <label for="exampleInputEmail1">Problem title </label>
        <input type="text" class="form-control mt-2" id="th_title" name="th_title" aria-describedby="th_title"
        placeholder="Enter title ">
        <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as possible
        </small>
        </div>
        
        <div class="form-group mt-3">
        <label for="exampleFormControlTextarea1">Elaborate your concern</label>
        <textarea class="form-control mt-2" id="th_desc" name="th_desc" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Submit</button>
        </form>
        </div>';
    }
    else{
        
       echo '<div class= "container"> <h1 class="py-2">Start a Discussion </h1>
       <p class="lead"><strong>Please login to start an discission</strong></p>
       </div>';

       }

?>

    <div class="container">
        <h1 class="py-2">Browse Questions </h1>
        <?php
               // for fetcting threads (question) 
               $sql="SELECT * FROM `thread` WHERE cat_id=$id";
               $result=mysqli_query($conn,$sql);
               $noresult=true ;
               while($row=mysqli_fetch_assoc($result)){
                    $noresult=false ;
               
               
               $th_id = $row['th_id'];
               $th_title= $row['th_title'];
               $th_desc= $row['th_desc'];
               $th_tstamp= $row['th_tstamp'];
               $th_uid = $row['uid'];
              
              
               $sql2="SELECT * FROM `users` where uid=$th_uid";
               $result2=mysqli_query($conn,$sql2);
               $row2=mysqli_fetch_assoc($result2);
               $un=$row2['uname'];

                   echo' <div class="media my-3">
                         <img src="parts/img/user.jpeg" width="50px" class="mr-3" alt="...">
                         <div class="media-body">
                         <h5 class="mt-0"> <a class="text-dark" href=thread.php?th_id='.$th_id.'>'.$th_title.'</a></h5>
                         '.$th_desc.' </div> <p class= "fw-bold my-0">Asked by :-'. $un .' at  '. $th_tstamp  .'</p>
                        
                              
                    </div>';
               }
               if ($noresult){
                    echo '<div class="jumbotron jumbotron-fluid"  style="background-color: #e3f2fd;">
                    <div class="container">
                      <p class="display-4"> No question asked </p>
                      <p class="lead">Be The First person to ask an question .</p>
                    </div>
                  </div>';
                  
               }
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