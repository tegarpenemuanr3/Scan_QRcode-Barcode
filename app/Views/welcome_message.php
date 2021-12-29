<?= $this->extend('layout/frontend'); ?>

<?= $this->section('link'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container">
	<div class="row">
		<div class="col text-center">
			<h1>QRcode</h1>
			<img src="data:image/png;base64,<?= $qrcode  ?>" alt="">
		</div>
		<div class="col text-center">
			<h1>Barcode</h1>
			<img src="data:image/png;base64,<?= $barcode  ?>" alt="">
		</div>
	</div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<?= $this->endSection(); ?>