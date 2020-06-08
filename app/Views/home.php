<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <div class="py-2">
        <a type="button" href="<?= base_url('/tsos') ?>" class="btn btn-outline-primary">TSOs List</a>
        <a type="button" href="<?= base_url('/mapping') ?>" class="btn btn-outline-info">TSO Thana Mapping</a>
    </div>
<?= $this->endSection() ?>