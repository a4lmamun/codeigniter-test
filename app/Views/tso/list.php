<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <div class="py-2">
		<?php if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
				<?= session()->getFlashdata('success') ?>
            </div>
		<?php endif; ?>
        <a type="button" href="<?= base_url('/tsos/create') ?>" class="btn btn-outline-primary" style="margin-bottom: 20px;">Add New</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Active?</th>
                <th>HR ID</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($tsos as $tso): ?>
                <tr>
                    <td><?= $tso['name'] ?></td>
                    <td><?= $tso['mobile_no'] ?></td>
                    <td><?= $tso['is_active'] == 1 ? 'Active' : 'Inactive' ?></td>
                    <td><?= $tso['hr_id'] ?></td>
                    <td><a href="<?= base_url('tsos/edit/' . $tso['id']) ?>">Edit</a></td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>

        <div style="display: flex; justify-content: center; margin-top: 20px;"><?= $pager->links() ?></div>
    </div>
<?= $this->endSection() ?>