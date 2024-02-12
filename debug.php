<?php 
$titre = 'Debug';
$nav = 'debug';
require 'header.php';
?>

<section id='sec-home' style='margin-top:5rem;'>
<h1>Debug</h1>
    <form action="" style="display: flex;justify-content: center;align-items: center;flex-direction: column;gap: 5rem">
        <h2 style='width: 70rem'>
            <?php
            print_r($_SESSION);
            ?>
        </h2>
        <a href='reset.php' style="">RESET</a>
    </form>
</section>


<?php 
require 'footer.php';
?>