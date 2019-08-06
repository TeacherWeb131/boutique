<?php
include WWW . "header.php";
foreach ($products as $product) :
?>
    <h2><?= $product->getName() ?></h2>
<?php 
endforeach; 
include WWW.'footer.php';
?>