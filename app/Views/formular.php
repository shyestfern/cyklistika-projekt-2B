<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>



<?= form_open('polozka/vytvorit') ?>
    <div class="form-floating mt-2 mb-2">
        <input name="real_name" class="form-control" placeholder="Vložte název prvku">
        <label for="real_name" class="form-label">real name</label>
    </div>
    <button type="submit" class="btn btn-primary">Odeslat</button>
</form>

<?= $this->endSection(); ?>