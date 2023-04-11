<?php

session_start();

session_unset();

header ("Location:../../view/user_login.view.php");
exit();

?>