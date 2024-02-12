<?php
require 'header.php';
$directory = 'img/*.{jpg,png,jpeg,avif}';
$files = glob($directory,GLOB_BRACE);
?>
<div class="testImg">
    <?php
    foreach ($files as $file) {
        ?>
        <a href=""><img src="<?php echo $file ?>"></a>
        <?php
    }
    ?>
</div>














<?php 
require 'footer.php';
?>