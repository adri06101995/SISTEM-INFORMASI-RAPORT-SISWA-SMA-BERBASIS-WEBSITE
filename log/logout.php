<?php

session_start();
$_session = [];
session_unset();
session_destroy();

header("Location: ../index.php");
exit;


?>