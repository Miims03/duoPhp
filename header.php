<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>
        <?php
        if (isset($titre)) {
            echo $titre;
        } else {
            echo "Site DuoPhp";
        }
        require 'function/auth.php';
        require 'function/age.php';
        require 'db.php';
        session_start();
        ?>
    </title>
</head>

<body>

    <header>
        <nav>
            <a href="index.php" class='logo'>
                Blog
            </a>
            <ul>
                <li><a href="index.php" class="<?php if ($nav === 'index') {
                    echo 'active';
                } ?>">Home</a></li>
                <li><a href="debug.php" class="<?php if ($nav === 'debug') {
                    echo 'active';
                } ?>">Debug</a></li>

            </ul>
            <ul class='log'>
                <?php
                if (!is_conn()) {
                    ?>
                    <li>
                        <a href="login.php" class="<?php if ($nav === 'login') {
                            echo 'active';
                        } ?>">Login</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    
                    <?php
                    $req = $pdo->query('SELECT picture FROM users WHERE user_id = "' . $_SESSION['user_id'] . '"');
                    $aff = $req->fetchAll();
                    foreach ($aff as $key) {
                        ?>
                        <!-- <a href="profil.php"><img src="<?php echo $key['picture'] ?>"></a> -->
                        <a href="profil.php"><img src="<?php echo $key['picture'] ?>"></a>
                        <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </header>