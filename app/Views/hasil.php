<?= $this->extend('layout/frontend'); ?>

<?= $this->section('link'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
                <div class="card-header pt-3">
                    <h5 class="font-weight-bold text-primary text-center">Hasil Scan</h5>
                </div>
                <div class="card-body text-center">
                    <h1><?= $data ?></h1>
                </div>
                <div class="card-footer">
                    <h6 class="text-center font-weight-bold text-primary">Hasil Scan QRCode/Barcode</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<?= $this->endSection(); ?>