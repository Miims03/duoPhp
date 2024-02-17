<?php
$titre = 'SignIn';
$nav = 'sign';
require 'header.php';
?>
<section id='sec-sign'>
    <h1>Inscription</h1>
    <?php
    $error = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['birth_day']) && !empty($_POST['ville'])) {
            if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['birth_day']) && isset($_POST['ville'])) {
                try {
                    $req = $pdo->prepare('INSERT INTO users VALUES(:user_id, :fname, :lname, :pseudo, :password, :birth_day, :picture, :id_ville_user)');
                    $req->execute([
                        'user_id' => NULL,
                        'fname' => $_POST['fname'],
                        'lname' => $_POST['lname'],
                        'pseudo' => $_POST['pseudo'],
                        'password' => $_POST['password'],
                        'birth_day' => $_POST['birth_day'],
                        'picture' => 'img/profil.png',
                        'id_ville_user' => $_POST['ville']
                    ]);
                    ?>
                    <h2 style="color:#00a400a9;font-size:20px;text-align:center">
                        Vous avez bien été inscrit
                        <br>
                        <span style="color:#00a400a9;font-size:15px;text-align:center">Vous allez être redirigé dans</span>
                        <span style="color:#00a400a9;font-size:15px;text-align:center" class='rebour'></span>
                    </h2>
                    <script>
                        const redirect = (sec) => {
                            let currentSec = sec;
                            const inter = setInterval(() => {
                                if (currentSec === 0) {
                                    clearInterval(inter);
                                    location.replace("profil.php");
                                } else {
                                    const rebour = document.querySelector('.rebour')
                                    rebour.innerHTML = currentSec
                                    currentSec--;
                                }
                            }, 1000);
                        }
                        redirect(5)
                    </script>
                    <?php
                    try {
                        $req = $pdo->query('SELECT user_id,pseudo,password FROM users WHERE pseudo ="' . $_POST['pseudo'] . '"');
                        $aff = $req->fetchAll();
                        foreach ($aff as $key) {
                                $_SESSION['user_id'] = $key["user_id"];
                                $_SESSION['pseudo'] = $_POST['pseudo'];
                                $_SESSION['connected'] = true;

                                header('location: profil.php');
                                exit;
                        }
                    } catch (PDOException) {
                        echo 'error';
                    }
                } catch (PDOException $e) {
                    echo '<h2 style="color:red;font-size:20px">Ce pseudo est déjà pris.</h2>';
                }
            } else {
                echo '<h2 style="color:red;font-size:20px">Erreur isset</h2>';
            }
        } else {
            $error = '<h2 style="color:red;font-size:20px">Ne pas laisser les champs vides</h2>';
        }
    }
    ?>
    <?php if ($error) {
        echo $error;
    } ?>
    <form action="signIn.php" method='POST'>
        <div>
            <label for="fname">FirstName : </label>
            <input type="text" name='fname' id='fname'>
        </div>
        <div>
            <label for="lname">LastName : </label>
            <input type="text" name='lname' id='lname'>
        </div>
        <div>
            <label for="pseudo">Pseudo : </label>
            <input type="text" name='pseudo' id='pseudo'>
        </div>
        <div>
            <label for="password">Password : </label>
            <input type="password" name='password' id='password'>
        </div>
        <div>
            <label for="birth_day">Date : </label>
            <input type="date" name='birth_day' id='birth_day'>
        </div>
        <div class='select'>
            <label for="ville">Ville : </label>
            <select name="ville" name='ville' id="ville">
            <option value="">Choose city</option>

                <?php 
                $req = $pdo->query('SELECT name_ville,id_ville FROM ville');
                $aff = $req->fetchAll();
                foreach ($aff as $key) {
                ?>
                <option value="<?php echo $key['id_ville'] ?>"><?php echo $key['name_ville'] ?></option>
                <?php 
                };
                ?>
            </select>
        </div>
        <button type='submit'>SignIn</button>
    </form>
</section>
<?php
require 'footer.php';
?>