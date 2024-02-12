<?php
$titre = 'Profil';
$nav = 'profil';
require 'header.php';
?>
<section id="sec-profil">

    <?php
    $req = $pdo->query('SELECT pseudo,fname,lname,birth_day,picture FROM users WHERE user_id = "' . $_SESSION['user_id'] . '"');
    $aff = $req->fetchAll();
    foreach ($aff as $key) {
        if (isset($_POST['newpp'])) {
            $pic = 'img/'.$_POST['newpp'];
            $req2 = $pdo->query('UPDATE users SET picture = "'.$pic.'" WHERE user_id = "' . $_SESSION['user_id'] . '"');
        header("refresh: 0.1; url=profil.php");
        }
        ?>
        <div class='cont1'>
            <div class='limg'>
                <img src="<?php echo $key['picture'] ?>">
                <a href="#" class="fa-solid fa-pen btnpp"></a>
                <form class='formpp' action="profil.php" method='POST'>
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
                        echo age($datetime).' ans';
                        ?> 
                    </h3>
                </div>

            </div>
        </div>
        <div class="cont2">
            <h1>cont2</h1>
        </div>
        <?php
    }
    ?>





</section>


<?php
require 'footer.php';
?>