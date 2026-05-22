<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<form method="post" action="<?= base_url("polozka/vytvorit") ?>">
    <input name="nazev" placeholder="Vložte název prvku">
    <button type="submit">Odeslat</button>
</form>

<?= $this->endSection(); ?>