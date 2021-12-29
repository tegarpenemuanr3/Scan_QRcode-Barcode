<?= $this->extend('layout/frontend'); ?>

<?= $this->section('link'); ?>
<link rel="stylesheet" href="<?= base_url('webcodecamjs/css/style.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <div class="card" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
                <div class="card-header pt-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Scan QRcode</h5>
                    <div class="text-right">
                        <select class="form-control text-right mb-2" id="camera-select"></select>
                        <button title="Aktif Kamera" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip">Play</button>
                        <button title="Stop Kamera" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip">Stop</button>
                        <button title="Aktif Kamera" class="btn btn-warning btn-sm" id="flip-kiri" type="button" data-toggle="tooltip">Flip Kiri</button>
                        <button title="Stop Kamera" class="btn btn-info btn-sm" id="flip-kanan" type="button" data-toggle="tooltip">Flip Kanan</button>
                    </div>
                </div>
                <div class="card-body text-center">
                    <div class="well" style="position: relative;display: inline-block;">
                        <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                        <!-- <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div> -->
                    </div>
                </div>
                <div class="card-footer">
                    <h6 class="text-center font-weight-bold text-primary">Arahkan QRCode/Barcode ke kamera</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script src="<?= base_url('webcodecamjs/js/qrcodelib.js') ?>"></script>
<script src="<?= base_url('webcodecamjs/js/webcodecamjquery.js') ?>"></script>
<script src="<?= base_url('webcodecamjs/js/main.js') ?>"></script>
<script>
    var arg = {
        resultFunction: function(result) {
            var hasil = result.code;
            var redirect = '<?= base_url('home/hasil') ?>';

            $.redirectPost(redirect, {
                hasil: hasil
            });
            // alert(result.code);
        }
    };

    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.play();
    // decoder.stop();
    decoder.buildSelectMenu("select");
    // Without visible select menu
    // decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();

    $('select').on('change', function() {
        decoder.stop().play();
    });

    // jquery extend function
    $.extend({
        redirectPost: function(location, args) {
            var form = '';
            $.each(args, function(key, value) {
                form += '<input type="hidden" name="' + key + '" value="' + value + '">';
            });
            $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
        }
    });

    //Button Aktif Kamera
    $('#play').click(function() {
        decoder.play();
    });

    //Button Non Aktif Kamera
    $('#stop').click(function() {
        decoder.stop();
    });

    $('#flip-kiri').click(function() {
        decoder.options.flipHorizontal = false;
    });


    $('#flip-kanan').click(function() {
        decoder.options.flipHorizontal = true;
    });
</script>

<?= $this->endSection(); ?>