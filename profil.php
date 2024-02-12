<?php
$titre = 'Profil';
$nav = 'profil';
require 'header.php';
?>
<section id="sec-profil">

    <?php
    $req = $pdo->query('SELECT pseudo,fname,lname,birth_day,picture,id_ville_user FROM users WHERE user_id = "' . $_SESSION['user_id'] . '"');
    $aff = $req->fetchAll();
    foreach ($aff as $key) {
        if (isset($_FILES['newpp'])) {

            $tmp_file = $_FILES['newpp']['tmp_name'];

            $destination_folder = 'img/';

            $filename = $_FILES['newpp']['name'];

            $destination_file = $destination_folder . $filename;
            move_uploaded_file($tmp_file, $destination_file);
            header("refresh: 0.1; url=profil.php");

        }


        ?>
        <!-- fa-solid fa-pen -->
        <div class='cont1'>
            <div class='limg'>
                <div class="shadowImg">
                    <div class="shad"><a class='fa-solid fa-pen'></a></div>
                    <img src="<?php echo $key['picture'] ?>">
                </div>
                <a class="fa-solid fa-download btnpp"></a>
                <form class='formpp' action="profil.php" method='POST' enctype="multipart/form-data">
                    <input type="file" name='newpp'>
                    <button type='submit'>Modifier</button>
                </form>

            </div>
            <div class='info'>
                <div class='info-label'>
                    <h3><a href="#" class="fa-solid fa-pen"></a> Pseudo </h3>
                    <h3><a href="#" class="fa-solid fa-pen"></a> FirstName </h3>
                    <h3><a href="#" class="fa-solid fa-pen"></a> LastName </h3>
                    <h3><a href="#" class="fa-solid fa-pen"></a> Age </h3>
                    <h3><a class="">**</a> Ville </h3>
                </div>
                <div class='info-rep'>
                    <h3>
                        <?php echo $key['pseudo'] ?>
                    </h3>
                    <h3>
                        <?php echo $key['fname'] ?>
                    </h3>
                    <h3>
                        <?php echo $key['lname'] ?>
                    </h3>
                    <h3>
                        <?php
                        $datetime = new DateTime($key['birth_day']);
                        echo age($datetime) . ' ans';
                        ?>
                    </h3>
                    <h3>
                        <?php
                        $req = $pdo->query('SELECT name_ville FROM ville WHERE id_ville = "' . $key['id_ville_user'] . '"');
                        $aff = $req->fetchAll();
                        foreach ($aff as $key) {
                            echo $key['name_ville'];
                        }
                        ?>

                    </h3>
                </div>

            </div>
        </div>
        <?php
    }
    ?>
    <div class="cont2">
        <div class="profilBase">
            <?php require 'function/profilBase.php'; ?>
        </div>
        <div class="ppChoice">
            <?php
            // require 'function/ppChoice.php';
            ?>
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
                    if (isset($_POST['ppChange'])) {
                        $pic = $_POST['ppChange'];
                        $req2 = $pdo->query('UPDATE users SET picture = "' . $pic . '" WHERE user_id = "' . $_SESSION['user_id'] . '"');
                        var_dump($_POST['ppChange']);
                        header("Refresh: 0.1; url=profil.php");
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
        </div>

    </div>






</section>


<?php
require 'footer.php';
?>