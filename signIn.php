<?php
$titre = 'SignIn';
$nav = 'sign';
require 'header.php';
?>
<section id='sec-sign'>
    <h1>Test DB php</h1>
    <?php
    $error = null;
    
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['age']) && !empty($_POST['ville'])){
        if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['age']) && isset($_POST['ville'])){
            try{    
            $req = $pdo->prepare('INSERT INTO users VALUES(:user_id, :fname, :lname, :pseudo, :password, :age, :id_ville_user)');
            $req->execute([
                'user_id' => NULL,
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'pseudo' => $_POST['pseudo'],
                'password' => $_POST['password'],
                'age' => $_POST['age'],
                'id_ville_user' => $_POST['ville']
            ]);
            echo '<h2 style="color:#00a400a9;font-size:20px">Vous avez bien été inscrit</h2>';
                // $_SESSION['fname'] = $_POST['fname'];
                // $_SESSION['lname'] = $_POST['lname'];
                // $_SESSION['pseudo'] = $_POST['pseudo'];
                // $_SESSION['password'] = $_POST['password'];
                // $_SESSION['age'] = $_POST['age'];
                // $_SESSION['ville'] = $_POST['ville'];
            }catch(PDOException $e) {
                // die("Erreur : " . $e->getMessage());
                echo '<h2 style="color:red;font-size:20px">Ce pseudo est déjà pris.</h2>';
            }
        }else{
            echo '<h2 style="color:red;font-size:20px">Erreur isset</h2>';
        }
    }else{
        $error =  '<h2 style="color:red;font-size:20px">Ne pas laisser les champs vide</h2>';
    }
    ?>
    <h2>Formulaire</h2>
    <?php if ($error) {
        echo $error;
    }?>
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
            <label for="age">Age : </label>
            <input type="number" name='age' id='age'>
        </div>
        <div class='select'>
            <label for="ville">Ville : </label>
            <select name="ville" name='ville' id="ville">
                <option value="">Choose country</option>
                <option value="1">Bruxelles</option>
                <option value="2">Marseille</option>
                <option value="3">Marrakech</option>
                <option value="4">New-York</option>
                <option value="5">Sérville</option>
                <option value="6">Valence</option>
                <option value="7">Namur</option>
                <option value="8">Paris</option>
                <option value="9">Casablanca</option>
                <option value="10">Las-Vegas</option>
            </select>
        </div>
        <button type='submit'>SignIn</button>
    </form>
</section>
<?php
require 'footer.php';
?>