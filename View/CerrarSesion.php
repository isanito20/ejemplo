<?php

unset($_SESSION);
session_destroy();
setcookie("PHPSESSID", 0, time()-100, "/");
header("Location: Index.php");
