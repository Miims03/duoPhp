<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>
        <?php
        require 'db.php';
        if (isset($titre)) {
            echo $titre;
        } else {
            echo "Site DuoPhp";
        }
        ?>
    </title>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="index.php" class="<?php if ($nav === 'index') {echo 'active';} ?>">Home</a></li>
            <li><a href="debug.php" class="<?php if ($nav === 'debug') {echo 'active';} ?>">Debug</a></li>
            <li><a href="signIn.php" class="<?php if ($nav === 'sign') {echo 'active';} ?>">SignIn</a></li>
        </ul>
    </nav>
</header>