<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <div class="py-2">
	    <?php if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <?= session()->getFlashdata('success') ?>
            </div>
	    <?php endif; ?>
	    <?php if (!empty(session()->getFlashdata('error'))): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <?= session()->getFlashdata('error') ?>
            </div>
	    <?php endif; ?>
        
        
        <a type="button" href="<?= base_url('/mapping/create') ?>" class="btn btn-outline-primary" style="margin-bottom: 20px;">Add New</a>
        <table class="table">
            <thead>
            <tr>
                <th>TSO Name</th>
                <th>Thana Name</th>
                <th>Active?</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($tsos as $tso): ?>
                <tr>
                    <td><?= $tso['tso_name'] ?></td>
                    <td><?= $tso['thana_name'] ?></td>
                    <td><?= $tso['is_active'] == 1 ? 'Active' : 'Inactive' ?></td>
                    <td><a href="<?= base_url('mapping/edit/' . $tso['id']) ?>">Edit</a></td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>

        <div style="display: flex; justify-content: center; margin-top: 20px;"><?= $pager->links() ?></div>
    </div>
<?= $this->endSection() ?>