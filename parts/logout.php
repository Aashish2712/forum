<?php
session_start();
echo 'logging out please wait ';
session_unset();
session_destroy();

$lout=true;
header("Location:/forum/index.php?lout=$lout")
?>