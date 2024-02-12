<?php
$req = $pdo->query('SELECT pseudo,fname,lname,birth_day,picture FROM users WHERE user_id = "' . $_SESSION['user_id'] . '"');
$aff = $req->fetchAll();
foreach ($aff as $key) {

?>

<h1>Bienvenue <?php echo $key['pseudo']?></h1>

<?php
}
?>
