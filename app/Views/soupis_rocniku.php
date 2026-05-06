<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1 class = "text-center m-4" > Ročníky závodu  <?= $record = $stranka_layout->find($default_name)?> </h1>

<?= $this->extend('layout/tabulka_layout');?>
<?= $this->extend('layout/stranka_layout');?>

<?= $this->section("content"); ?>

<?= $this->section("tabulka");?>
<?php 

$table = new \CodeIgniter\View\Table();
if ('start_date = end_date'){
    echo('start_date');  
}
$table->setHeading('real_name', 'start_date - end_date', 'uci_tour', 'rank', 'id_rider');
$table->addRow($field);

echo $table->generate();
?>
<?= $this->endSection("tabulka");?>

<?= $this->endSection("conent");?>
</body>
</html>