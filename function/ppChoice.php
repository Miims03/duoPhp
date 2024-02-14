<h1>Choisissez une photo de profil</h1>
<div class="imgPpChoice">

    <?php
    $directory = 'img/*.{jpg,png,jpeg,avif}';
    $files = glob($directory, GLOB_BRACE);
    foreach ($files as $file) {
        ?>
            <img class='imgslc' src="<?php echo $file ?>">
        <?php
    }
    $req = $pdo->query('SELECT pseudo,fname,lname,birth_day,picture FROM users WHERE user_id = "' . $_SESSION['user_id'] . '"');
    $aff = $req->fetchAll();
    foreach ($aff as $key) {
        if (isset($_POST['ppChange']) && !empty($_POST['ppChange'])) {
            $pic = $_POST['ppChange'];
            $req2 = $pdo->query('UPDATE users SET picture = "' . $pic . '" WHERE user_id = "' . $_SESSION['user_id'] . '"');
            // header("Refresh: 0.1; url=profil.php");
            ?>
            <script> location.replace("profil.php"); </script>
            <?php
        }
        ?>
    </div>
    <form class='formpp' action="profil.php" method='POST'>
        <input type="hidden" name='ppChange' class="ppChangeInput">
        <button type='submit'>Modifier</button>
    </form>
    <?php
    }
    ?>