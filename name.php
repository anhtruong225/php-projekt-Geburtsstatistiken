<?php 
include 'views/header.php';
include 'inc/names.php';
include 'inc/functions.php';

$currentName = $_GET['name'];
$filteredDetail = [];

foreach($names AS $detailName ){
    $name = $detailName['name'];

    if(!empty($currentName) && $currentName === $name) {
        $filteredDetail[] = $detailName;
    }

    }
        

?>
<a href="index.php">Zurück zur Homepage</a>
<?php if(!empty($filteredDetail)): ?>
<h3>
    Geburtsstatistiken des Names: <?php echo e($currentName)?>
</h3>
<?php 
$chartYear = [];
$chartCount = [];
foreach($filteredDetail AS $detailName) {
    $chartYear[] = $detailName['year'];
    $chartCount[] = $detailName['count'];
}

?>
<script type="text/javascript" src="scripts/chart.js"></script>
<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($chartYear); ?>,
        datasets: [{
            label: '# of Babies',
            data: <?php echo json_encode($chartCount); ?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<table>
    <thead>
        <tr>
            <th>Jahr</th>
            <th>Anzahl Geburten</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($filteredDetail AS $detailName) :?>
        <tr>
            <td><?php echo $detailName['year'];?></td>
            <td><?php echo $detailName['count']; ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>


</table>
<?php endif; ?>
<?php include 'views/footer.php'; ?>