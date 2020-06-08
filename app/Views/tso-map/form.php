<?= $this->extend('app') ?>
<?= $is_edit = isset($map) ?>

<?= $this->section('content') ?>
<div class="py-2">
    <div class="py-2 bg-light">
        <form class="m-5" method="POST" action="/mapping/<?= $is_edit ? "edit/" . $map['id'] : "create" ?>">
			<?= csrf_field() ?>

            <div class="form-group row">
                <label for="tso-list" class="col-sm-2 col-form-label">TSO</label>
                <div class="col-sm-6">
                    <select class="form-control" id="tso-list" name="tso_id" required>
                        <?php foreach ($tsos as $tso): ?>
                        <option value="<?= $tso->id ?>" <?= $is_edit && $tso->id === $map['tso_id'] ? 'selected' : '' ?>><?= $tso->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="thana-list" class="col-sm-2 col-form-label">Thana</label>
                <div class="col-sm-6">
                    <select class="form-control" id="thana-list" name="thana_id" required>
                        <?php foreach($thanas as $thana): ?>
                        <option value="<?= $thana->id ?>" <?= $is_edit && $thana->id === $map['thana_id'] ? 'selected' : '' ?>><?= $thana->name?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="is_active" class="col-sm-2 col-form-label">Is Active?</label>
                <div class="col-sm-1">
                    <input type="checkbox" class="form-control" id="is_active" name="is_active" <?= $is_edit && $map['is_active'] == 1 ? 'checked' : '' ?>>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
