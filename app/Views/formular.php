<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<form method="post" action="<?= base_url("polozka/vytvorit") ?>">
    <div class="form-floating mt-2 mb-2">
        <input name="nazev" class="form-control" placeholder="Vložte název prvku">
        <label for="nazev" class="form-label">Název</label>
    </div>
    <button type="submit" class="btn btn-primary">Odeslat</button>
</form>

<?= $this->endSection(); ?>