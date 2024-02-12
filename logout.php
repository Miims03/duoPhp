<?php
session_start();
unset($_SESSION['connected']);
unset($_SESSION['pseudo']);
unset($_SESSION['user_id']);
header('location: index.php');
