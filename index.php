<?php 
include 'views/header.php';
include 'inc/names.php';
include 'inc/functions.php';
include 'views/nav.php';

?>

<?php if(!empty($_GET['char']) && is_string($_GET['char'])) :?>
<hr />
<?php 
    $char = $_GET['char'][0];
    $filteredFullNames = [];

    foreach ($names AS $nameArray){
        
        if ($char === $nameArray['name'][0]){
            $currentName = $nameArray['name'];
            if (empty($filteredFullNames[$currentName])){
                $filteredFullNames[$currentName] = true;
            }
        }  
    }
    ?>
<h2>Hier findet man die Liste von Namen startet mit <?php echo e($char) ?></h2>
<ul>
    <?php foreach($filteredFullNames AS $currentName => $r) :?>
    <li>
        <a href="name.php?<?php echo http_build_query(['name' => $currentName]);?>"><?php echo e($currentName)?></a>
    </li>
    <?php endforeach;?>
</ul>

<?php endif; ?>
<?php include 'views/footer.php' ?>