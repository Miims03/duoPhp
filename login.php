<?php
$titre = 'Login';
$nav = 'login';
require 'header.php';
?>

<section id='sec-sign'>
<h1>login</h1>
<?php 
$req = $pdo->query('SELECT pseudo,password FROM users');
$aff = $req->fetchAll();
// $req = $pdo->query('SELECT * FROM users WHERE pseudo = "Miims"');


// echo '<pre>' , var_dump($aff) , '</pre>';
$userFalse = null;

if (!empty($_POST['pseudo']) || !empty($_POST['password'])) {
    foreach ($aff as $key) {
        if ($_POST['pseudo'] == $key["pseudo"]){
            echo $key["pseudo"];
            $req = $pdo->query('SELECT * FROM users WHERE pseudo ="'.$_POST['pseudo'].'"');
            $aff = $req->fetchAll();

    // echo('ID : '.$key["password"].'<br>Pseudo : '.$key["pseudo"].'<br>');
        }else{
            $userFalse =  'Username incorrecte';
        }
    }
}else{
    echo 'Ne pas laisser les champs vide.';
}
// if ($userFalse) {
//     echo $userFalse;
// }




// for ($i=0; $i < sizeof($aff); $i++) { 
//     // echo $aff[$i];
//     for ($a=0; $a < sizeof($aff[$i]); $a++) { 
//         echo $aff[$i][$a].'<br>';
//     }
// }
?>
<form action="login.php" method='POST'>
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
</section>


<?php
require 'footer.php';
?>