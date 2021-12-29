<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use CodeItNow\BarcodeBundle\Utils\QrCode;


class Home extends BaseController
{
    public function __construct()
    {
        $this->qrCode = new QrCode();
        $this->barcode = new BarcodeGenerator();
    }

    public function index()
    {
        //QRcode
        $this->qrCode
            ->setText('Tegar Penemuan')
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Tegar Penemuan')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);
        $qrcode = $this->qrCode->generate();


        //Barcode
        $this->barcode->setText("0123456789");
        $this->barcode->setType(BarcodeGenerator::Code128);
        $this->barcode->setScale(3);
        $this->barcode->setThickness(25);
        $this->barcode->setFontSize(10);
        $code = $this->barcode->generate();

        $barcode = $code;

        $data = [
            'qrcode' => $qrcode,
            'barcode' => $barcode,
            'title' => 'Home QRcode dan Barcode'
        ];

        return view('welcome_message', $data);
    }

    public function scan()
    {
        $data = [
            'data' => $this->request->getPost("hasil"),
            'title' => 'Scan QRcode dan Barcode'
        ];
        return view('scan', $data);
    }

    public function hasil()
    {
        $data = [
            'data' => $this->request->getPost("hasil"),
            'title' => 'Hasil QRcode dan Barcode'
        ];
        return view('hasil', $data);
    }
}
