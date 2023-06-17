<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
      initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">

    <title>Coder Bench </title>
</head>
<style>
#maincontainer {
    min-height: 85vh;
}
</style>

<body>
    <?php require "parts/nav.php";?>
    <?php  require"parts/db_con.php"; ?>


    <div class="container my-3" id="maincontainer">
        <h1 class="py-2">Search results for <em>"<?php echo $_GET['search']    ?>"</em> </h1>


        <?php
    $searchre=$_GET["search"];
$sql="SELECT * FROM thread WHERE match (`th_title`,`th_desc`) against ('$searchre')";
$noresult= true;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{    $noresult=false;
    $th_title=$row['th_title'];
    $th_desc=$row['th_desc'];
    $th_id=$row['th_id'];
    $url="thread.php?th_id=".$th_id;
    echo'
    <div class="result">
    
    <h3><a href=" '.$url.'" class="text-dark">'. $th_title .' </a></h3>
    <p>'. $th_desc .'
    </p>
    </div>';
}
if ($noresult){
    echo '<div class="jumbotron jumbotron-fluid"  style="background-color: #e3f2fd;">
    <div class="container">
      <p class="display-4"> No result found  </p>
      <p class="lead">Suggestions:<ul>
      
     <li>Make sure that all words are spelled correctly.</li> 
     <li>Try different keywords.</li> 
     <li> Try more general keywords.</li> 
      </ul>
      .</p>
      </div>
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