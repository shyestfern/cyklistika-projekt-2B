<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<h1 class="text-center m-4">Upravit ročník</h1>

<?php

    /**@var object $race_year */

    $nazev = $race_year->real_name;

    $dataLogo = array(
        'type' => 'file',
        'name' => 'logo',
        'id' => 'logo',
        'class' => 'form-control',
        'accept' => '.jpg, .jpeg, .png, .svg'
    );


    $dataName = array(
        'name' => 'real_name',
        'id' => 'real_name',
        'class' => 'form-control',
        'required' => 'required',
        'placeholder' => 'Vložte název ročníku',
        'value' => $nazev
    );

    $dataLabel = array(
        'class' => 'form-label'
    );

    $dataBtn = array(
        'type' => 'submit',
        'class' => 'btn btn-primary',
        'content' => 'Odeslat'
    );

    $startDate = $race_year->start_date;

    $dataDateStart = array(
        'name' => 'start_date',
        'id' => 'start_date',
        'class' => 'form-control',
        'required' => 'required',
        'placeholder' => 'Vložte start datum',
        'value' => $startDate
    );

    $endDate = $race_year->end_date;

    $dataDateEnd = array(
        'name' => 'end_date',
        'id' => 'end_date',
        'class' => 'form-control',
        'required' => 'required',
        'placeholder' => 'Vložte end datum',
        'value' => $endDate
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

    $dataSkryta = array(
        'id' => $race_year->id,
        '_method' => 'PUT'
    );

    echo form_open_multipart('polozka/aktualizovat');

?>

<div class="form-floating mt-2 mb-2">

    <?= form_input($dataLogo); ?>
    <?= form_label('Logo', 'logo', $dataLabel); ?>

</div>

<div class="form-floating mt-2 mb-2">

    <?= form_input($dataName); ?>
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

    <?= form_dropdown('uci_tour', $dataUCI, $race_year->uci_tour, $atributyUCI); ?>
    <?= form_label('UCI Tour', 'uci_tour', $dataLabel); ?>

</div>

<?= form_hidden($dataSkryta); ?>

<?= form_button($dataBtn); ?>

<?= form_close() ?>

<?= $this->endSection(); ?>