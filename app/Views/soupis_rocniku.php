<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?= $this->extend('layout/tabulka_layout');?>
<?= $this->extend('layout/stranka_layout');?>

<?= $this->section("content"); ?>

<?= $this->section("tabulka");?>
<?php 

$table = new \CodeIgniter\View\Table();
$table->setHeading('real_name', 'start_date', 'end_date', 'uci_tour', 'category');
$table->addRow($field);

echo $table->generate();
?>
<?= $this->endSection("tabulka");?>

<?= $this->endSection("conent");?>
</body>
</html>