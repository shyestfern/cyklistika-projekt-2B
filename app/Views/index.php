<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<h1 class="text-center m-4">Závody kategorie elite u mužů</h1>

<?php
    $table = new \CodeIgniter\View\Table();
    $table->setHeading("Název", "Země");

    foreach($zavod as $row){
        $table->addRow($row->default_name, $row->country);
        $table->setTemplate()
    }
?>

<?= $this->endSection(); ?>