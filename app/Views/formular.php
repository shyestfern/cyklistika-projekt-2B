<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<?php

    $dataInput = array(
        'name' => 'real_name',
        'id' => 'name',
        'class' => 'form-control',
        'placeholder' => 'Vložte název prvku'
    );

    $dataLabel = array(
        'class' => 'form-label'
    );

    $dataBtn = array(
        'type' => 'submit',
        'class' => 'btn btn-primary',
        'content' => 'Odeslat'
    );

    echo form_open('polozka/vytvorit');

?>

<div class="form-floating mt-2 mb-2">

    <?= form_input($dataInput); ?>
    <?= form_label('real name', 'name', $dataLabel); ?>

</div>

<?= form_button($dataBtn); ?>

<?= form_close() ?>

<?= $this->endSection(); ?>