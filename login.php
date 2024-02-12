<?php
$titre = 'Login';
$nav = 'login';
require 'header.php';
?>

<section id='sec-sign'>
    <h1>login</h1>
    <?php
    $userFalse = null;
    $empty = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
            $req = $pdo->query('SELECT pseudo FROM users');
            $aff = $req->fetchAll();
            if (sizeof($aff) > 0) {
                foreach ($aff as $key) {
                    if ($_POST['pseudo'] == $key["pseudo"]) {
                        $req2 = $pdo->query('SELECT user_id,password FROM users WHERE pseudo ="' . $_POST['pseudo'] . '"');
                        $aff2 = $req2->fetchAll();
                        foreach ($aff2 as $key) {
                            if ($_POST['password'] == $key['password']) {
                                $_SESSION['user_id'] = $key["user_id"];
                                $_SESSION['pseudo'] = $_POST['pseudo'];
                                $_SESSION['connected'] = true;

                                header('location: index.php');
                                exit;
                            } else {
                                $userFalse = '<h2 style="color:red;font-size:20px">Pseudo ou mot de passe incorrect</h2>';
                            }
                        }
                    } else {
                        $userFalse = '<h2 style="color:red;font-size:20px">Pseudo ou mot de passe incorrect</h2>';
                    }
                }
            } else {
                $userFalse = '<h2 style="color:red;font-size:20px">Pseudo ou mot de passe incorrect</h2>';
            }
        } else {
            $empty = '<h2 style="color:red;font-size:20px">Ne pas laisser les champs vides</h2>';
        }
    }

    if ($empty) {
        echo $empty;
    }
    if ($userFalse) {
        echo $userFalse;
    }
    ?>

    <form style='height: 25vh;' action="login.php" method='POST'>
        <div>
            <label for="pseudo">Pseudo : </label>
            <input type="text" name='pseudo' id='pseudo'>
        </div>
        <div>
            <label for="password">Password : </label>
            <input type="password" name='password' id='password'>
        </div>
        <button type='submit'>SignIn</button>
    </form>
    <a href="signIn.php" class="inscr">Inscription</a>
</section>


<?php
require 'footer.php';
?>