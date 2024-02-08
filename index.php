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
        <div class='left'><</div>
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
        <div>
            <img src="img/fleur.jpg">
            <h3>Fleur</h3>
            <article>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. At quos aut, nisi, incidunt repellat fugit consequatur nihil placeat sed hic distinctio voluptatibus beatae recusandae voluptates?
            </article>
        </div>
        <div class='right'>></div>
    </div>
</section>
<?php
require 'footer.php';
?>