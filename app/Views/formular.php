<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<h1 class="text-center m-4">Přidat ročník</h1>

<?php

    $dataInput = array(
        'name' => 'real_name',
        'id' => 'real_name',
        'class' => 'form-control',
        'required' => 'required',
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
        'required' => 'required',
        'placeholder' => 'Vložte start datum'
    );

    $dataDateEnd = array(
        'name' => 'end_date',
        'id' => 'end_date',
        'class' => 'form-control',
        'required' => 'required',
        'placeholder' => 'Vložte end datum'
    );

    $dataUCI = array(
        'default' => 'Vyberte položku',
        1 => 'UCI Worldtour',
        2 => 'UCI World Championships',
        3 => 'Africa Tour',
        4 => 'Asia Tour',
        5 => 'Europe Tour',
        6 => 'Men Junior',
        7 => 'Women Elite',
        8 => 'Women Junior',
        9 => 'America Tour',
        10 => 'Nations Cup',
        11 => 'National Championship',
        12 => 'WWT',
        13 => 'UCI Pro Series',
        14 => 'Oceania Tour'
    );

    $atributyUCI = 'id="uci" class="form-select" required="required"';

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

    <?= form_dropdown('uci_tour', $dataUCI, 'default', $atributyUCI); ?>
    <?= form_label('UCI Tour', 'uci_tour', $dataLabel); ?>

</div>

<div class="mt-2">
    <textarea id="description" name="description" class="form-control" rows="8"></textarea>
</div>

<?= form_button($dataBtn); ?>

<?= form_close() ?>

<script>
    tinymce.init({
        selector: '#description',
        height: 300,
        menubar: true,
        plugins: 'lists link image table',
        toolbar: 'undo redo | blocks | bold italic underline | bullist numlist | link image | table | removeformat'
    });
</script>

<?= $this->endSection(); ?>