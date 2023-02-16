<?php
session_start();
session_unset();
session_destroy();
header('Location:../Log-in_Doctor.php?session=off');
?>