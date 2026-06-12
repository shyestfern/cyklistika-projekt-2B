<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<h1 class="text-center m-4">Upravit ročník</h1>

<?php

    $dataInput = array(
        'name' => 'real_name',
        'id' => 'real_name',
        'class' => 'form-control',
        'placeholder' => 'Vložte název ročníku'
    );

    $dataLabel = array(
        'class' => 'form-label'
    );

    $dataBtn = array(
        'type' => 'submit',
        'class' => 'btn btn-primary',
        'content' => 'Odeslat'
    );

    $dataDateStart = array(
        'name' => 'start_date',
        'id' => 'start_date',
        'class' => 'form-control',
        'placeholder' => 'Vložte start datum'
    );

    $dataDateEnd = array(
        'name' => 'end_date',
        'id' => 'end_date',
        'class' => 'form-control',
        'placeholder' => 'Vložte end datum'
    );

    /**@var array $uci_tour */

    $dataUCI = $uci_tour;

    echo form_open('polozka/vytvorit');

?>

<div class="form-floating mt-2 mb-2">

    <?= form_input($dataInput); ?>
    <?= form_label('Název', 'real_name', $dataLabel); ?>

</div>

<div class="form-floating mt-2 mb-2">

    <?= form_input($dataDateStart); ?>
    <?= form_label('Start datum', 'start_date', $dataLabel); ?>

</div>

<div class="form-floating mt-2 mb-2">

    <?= form_input($dataDateEnd); ?>
    <?= form_label('End datum', 'end_date', $dataLabel); ?>

</div>

<div class="form-floating mt-2 mb-2">

    <?= form_dropdown('uci_tour', $dataUCI, 'default', 'id="uci" class="form-select"'); ?>
    <?= form_label('UCI Tour', 'uci_tour', $dataLabel); ?>

</div>

<?= form_button($dataBtn); ?>

<?= form_close() ?>

<?= $this->endSection(); ?>