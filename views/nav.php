<?php 
include 'inc/names.php';

$filteredNames = [];
foreach ($names AS $nameArray) {
//  print_r($nameArray['name'][0]);
$firstLetter = $nameArray['name'][0];
if (empty($filteredNames[$firstLetter])){
    $filteredNames[$firstLetter] = true;
}
}
?>
<nav>
    <?php foreach ($filteredNames AS $filteredName => $t) :?>
    <a href="index.php?char=<?php echo $filteredName?>"
        <?php if (!empty($_GET['char']) && $_GET['char'] === $filteredName) :?> class="selected"
        <?php endif; ?>><?php echo $filteredName?></a>
    <?php endforeach; ?>
</nav>