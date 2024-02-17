<?php
$titre = 'Home';
$nav = 'index';
require 'header.php';
?>

<section id='sec-home'>
    <div class="banner">
        <div class='titre'>
            <h1>Blog des écrivains</h1>
        </div>
        <div class='vid'>
            <video autoplay loop muted>
                <source src="img/ble.mp4">
        </div>
    </div>
    <div class="articles">
        <h1>Articles de blog</h1>
        <div class='lesArticles'>

        
        <div class='left'><</div>
        <div class = 'contArticle'>
        <div class='test'>
            <img src="img/fleur.jpg">
            <h3>Fleur</h3>
            <article>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. At quos aut, nisi, incidunt repellat fugit consequatur nihil placeat sed hic distinctio voluptatibus beatae recusandae voluptates?
            </article>
        </div>
        <div>
            <img src="img/fleur.jpg">
            <h3>Fleur</h3>
            <article>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. At quos aut, nisi, incidunt repellat fugit consequatur nihil placeat sed hic distinctio voluptatibus beatae recusandae voluptates?
            </article>
        </div>
        <div>
            <img src="img/fleur.jpg">
            <h3>Fleur</h3>
            <article>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. At quos aut, nisi, incidunt repellat fugit consequatur nihil placeat sed hic distinctio voluptatibus beatae recusandae voluptates?
            </article>
        </div>
        </div>
        <div class='right'>></div>
        </div>
    </div>
    <div class="tabVille">
        <h1>Tableau de Ville</h1>
        <div class="tab">
            <div class="id">
                <h3>Id Ville</h3>
                <?php 
                $req = $pdo->query('SELECT name_ville,capitale,pays,id_ville FROM ville');
                $aff = $req->fetchAll();
                foreach ($aff as $key) {
                    $name_ville = $key['name_ville'];
                    $capitale = $key['capitale'];
                    $pays = $key['pays'];
                    $idVille = $key['id_ville'];
                ?>
                <h2><?php echo $idVille ?></h2>
                <?php 
                }
                ?>
            </div>
            <div class="ville">
                <h3>Ville</h3>
                <?php 
                foreach ($aff as $key) {
                ?>
                <h2><?php echo $key['name_ville'] ?></h2>
                <?php
                }
                ?>
            </div>
            <div class="pays">
                <h3>Pays</h3>
                <?php 
                foreach ($aff as $key) {
                    echo '<h2>'.$key['pays'].'</h2>';
                }
                ?>
            </div>
            <div class="capitale">
                <h3>Capitale</h3>
                <?php 
                foreach ($aff as $key) {
                    echo '<h2>'.$key['capitale'].'</h2>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
require 'footer.php';
?>