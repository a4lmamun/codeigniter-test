<?= $this->extend('app') ?>
<?= $is_edit = isset($tso) ?>

<?= $this->section('content') ?>
<div class="py-2">
    <div class="py-2 bg-light">
        <form class="m-5" method="POST" action="/tsos/<?= $is_edit && !empty($tso['edit']) ? "edit/" . $tso['id'] : "create" ?>">
			<?= csrf_field() ?>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Name" value="<?= $is_edit ? $tso['name'] : old('name') ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="mobile_no" required id="phone" placeholder="Phone" value="<?= $is_edit ? $tso['mobile_no'] : old('mobile_no') ?>">
					<?php if (\Config\Services::validation()->hasError('mobile_no')): ?>
                        <small class="form-text text-muted"><?= \Config\Services::validation()->getError('mobile_no') ?></small>
					<?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="is_active" class="col-sm-2 col-form-label">Is Active?</label>
                <div class="col-sm-1">
                    <input type="checkbox" class="form-control" id="is_active" <?= $is_edit && $tso['is_active'] == 1 ? 'checked' : '' ?> name="is_active">
                </div>
            </div>
            <div class="form-group row">
                <label for="hrid" class="col-sm-2 col-form-label">HR ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="hr_id" id="hrid" placeholder="HR ID" value="<?= $is_edit ? $tso['hr_id'] : old('hr_id') ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
