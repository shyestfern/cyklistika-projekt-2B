<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Úspěch!</strong>
</div>

<?php if (!empty($alert->message)): ?>
    <div class="mt-3 alert alert-<?= $alert->class ?> alert-dismissible fade show" role="alert">
        <?= $alert->message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>