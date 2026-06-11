<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<?php /**@var object $yearInfo */ ?>

<h1 class="text-center m-4"><?= $yearInfo->real_name ?></h1>

<?php

?>

<?= $this->endSection(); ?>