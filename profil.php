<?php
$titre = 'Profil';
$nav = 'profil';
require 'header.php';
if (!is_conn()) {
    echo '<script> location.replace("login.php"); </script>';
} else {
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
                echo '<script> location.replace("profil.php"); </script>';

            }
            ?>
            <div class='cont1'>
                <div class='limg'>
                    <div class="shadowImg">
                        <div class="shad"><a class='fa-solid fa-pen'></a></div>
                        <img class='imgPP' src="<?php echo $key['picture'] ?>">
                    </div>
                    <a class="fa-solid fa-download btnpp"></a>
                    <form class='formpp' action="profil.php" method='POST' enctype="multipart/form-data">
                        <input type="file" name='newpp'>
                        <button type='submit'>Modifier</button>
                    </form>

                </div>

                <?php
                if (!empty($_POST['inputPseudo']) && !empty($_POST['inputFname']) && !empty($_POST['inputLname']) && !empty($_POST['inputAge']) && !empty($_POST['ville'])){
                    try{
                        $req2 = $pdo->query('UPDATE users SET 
                        pseudo = "' . $_POST['inputPseudo'] . '",
                        fname = "' . $_POST['inputFname'] . '",
                        lname = "' . $_POST['inputLname'] . '",
                        birth_day = "' . $_POST['inputAge'] . '",
                        id_ville_user = "' . $_POST['ville'] . '"
                        WHERE user_id = "' . $_SESSION['user_id'] . '"');
                        $_SESSION['pseudo'] = $_POST['inputPseudo'];
                        echo '<script> location.replace("profil.php"); </script>';
                    }catch(PDOException $e){
                        echo ('Ce pseudo existe déjà');
                    }
                }

                ?>
                <form action="profil.php" method='POST' class='formModif'>
                    <div class='info'>
                        <div class='info-label'>
                            <h3><a class="fa-solid fa-pen btnPseudo"></a> Pseudo </h3>
                            <h3><a class="fa-solid fa-pen btnFname"></a> FirstName </h3>
                            <h3><a class="fa-solid fa-pen btnLname"></a> LastName </h3>
                            <h3><a class="fa-solid fa-pen btnAge"></a> Age </h3>
                            <h3><a class="fa-solid fa-pen btnVille"></a> Ville </h3>
                            <h3><a class="">**</a> Nationnalité </h3>
                        </div>


                        <div class='info-rep'>

                            <h3 class='h3Pseudo'>
                                <?php echo $key['pseudo'] ?>
                            </h3>
                            <input class='inputPseudo' name='inputPseudo' type="hidden" value='<?php echo $key['pseudo'] ?>'>

                            <h3 class='h3Fname'>
                                <?php echo $key['fname'] ?>
                            </h3>
                            <input class='inputFname' name='inputFname' type="hidden" value='<?php echo $key['fname'] ?>'>

                            <h3 class='h3Lname'>
                                <?php echo $key['lname'] ?>
                            </h3>
                            <input class='inputLname' name='inputLname' type="hidden" value='<?php echo $key['lname'] ?>'>


                            <h3 class='h3Age'>
                                <?php
                                $datetime = new DateTime($key['birth_day']);
                                echo age($datetime) . ' ans';
                                ?>
                            </h3>
                            <input class='inputAge' name='inputAge' type="hidden" value='<?php echo $key['birth_day'] ?>'>


                            <h3 class='h3Ville'>
                                <?php
                                $req = $pdo->query('SELECT name_ville,nationnalite,id_ville FROM ville WHERE id_ville = "' . $key['id_ville_user'] . '"');
                                $aff = $req->fetchAll();
                                foreach ($aff as $key) {
                                    echo $key['name_ville'];
                                    $lavile = $key['name_ville'];
                                    $natio = $key['nationnalite'];
                                ?>
                            </h3>



                            <select name="ville" name='ville' id="ville" class='inputVille'>
                            <option value="<?php echo $key['id_ville'] ?>"><?php echo $key['name_ville'] ?></option>
                            <?php 
                            }
                            ?>
                                <?php 
                                $req = $pdo->query('SELECT name_ville,id_ville FROM ville');
                                $aff = $req->fetchAll();
                                foreach ($aff as $key) {
                                    if($lavile != $key['name_ville']):
                                ?>
                                <option value="<?php echo $key['id_ville'] ?>"><?php echo $key['name_ville'] ?></option>
                                <?php endif;
                                }
                                ?>
                            </select>




                            <h3>
                                <?php 
                                echo $natio;
                                ?>
                            </h3>

                        </div>


                    </div>
                    <button type='submit' class='btnSubModif'>Modifier</button>
                </form>
            </div>
            <?php
        }
        ?>
        <div class="cont2">
            <div class="profilBase">
                <?php
                require 'function/profilBase.php';
                ?>
            </div>
            <div class="ppChoice">
                <?php
                require 'function/ppChoice.php';
                ?>
            </div>

        </div>
    </section>
    <?php
}
require 'footer.php';
?>