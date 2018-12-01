<?php
$extracurricular = $_POST['listExtra'];

session_start();
$_SESSION['listExtra'] = $extracurricular;
?>