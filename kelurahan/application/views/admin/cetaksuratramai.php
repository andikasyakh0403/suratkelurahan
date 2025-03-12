<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Surat Keramaian</title>
</head>
<style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", serif;
            font-size: 12pt;
        }
        .page {
            width: 210mm;
            height: 22mm;
            margin-left:-100px;
            margin-top:-100px;
            padding: 2cm;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header img {
            height: 90px;
        }
        .title {
            text-align: center;
            font-size: 18pt;
            font-weight: bold;
            margin-top: 10px;
        }
        .subtitle {
            text-align: center;
            font-size: 12pt;
            margin-top: -10px;
        }
        .line {
            border-bottom: 3px solid black;
            margin-top: -6px;
            max-width: 18cm;
            max-width: 90%;
            margin-left: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            padding: 5px;
            vertical-align: top;
        }
        .footer {
            text-align: right;
            margin-top: 40px;
            margin-right: 100px;
            font-weight: bold;
        }
    </style>
<body>
<?php
$image_path = FCPATH . 'assets/img/upload/kelurahan keagungan.png'; // Path absolut ke gambar
$image_data = file_get_contents($image_path); // Baca file gambar
$image_base64 = base64_encode($image_data); 
$image_patha = FCPATH . 'assets/img/upload/logodki.png'; // Path absolut ke gambar
$image_dataa = file_get_contents($image_patha); // Baca file gambar
$image_base62 = base64_encode($image_dataa); 
$image_pathb = FCPATH . 'assets/img/ttd.jpg'; // Path absolut ke gambar
$image_datab = file_get_contents($image_pathb); // Baca file gambar
$image_base60 = base64_encode($image_datab); 
// Encode ke base64
?>

<div class="page">
    <!-- Header -->
    <div class="header">
        <table width="100%">
            <tr>
                <td width="15%" align="left">
                    <img src="data:image/png;base64,<?= $image_base64; ?>" alt="Logo Kelurahan" style="margin-top: 18px; margin-left: 40px;">
                </td>
                <td width="70%" align="center">
                    <h2>KELURAHAN KEAGUNGAN</h2>
                    <p class="subtitle">
                        Jl. Keagungan No.14 RT.05 RW.09, Kel. Keagungan, Kec. Tamansari,<br> Jakarta Barat 
                        Kode Pos: 11130 | Telepon: 12121212212 | <br> Email: kelurahankeagungan@gmail.com
                    </p>
                </td>
                <td width="15%" align="right">
                    <img src="data:image/png;base64,<?= $image_base62; ?>" alt="Logo DKI Jakarta" style="margin-right: 70px; margin-top: 18px; max-width: 100px;max-height: 100px" >
                </td>
                
            </tr>
        </table>
    </div>

    <!-- Garis Pembatas -->
    <hr class="line">
    <br>

    <!-- Judul Surat -->
    <h2 class="title">SURAT KERAMAIAN</h2>
    <p>Yang bertanda tangan di bawah ini ingin mengajukan surat keramaian dengan data sebagai berikut:</p>

    <!-- Isi Surat -->
    <table>
        <tr>
            <td width="30%">Email</td>
            <td>: <?= $suratramai['email']; ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: <?= $suratramai['nik']; ?></td>
        </tr>
        <tr>
            <td>No. Telepon</td>
            <td>: <?= $suratramai['notelepon']; ?></td>
        </tr>
        <tr>
            <td>Pengajuan Hari</td>
            <td>: <?= $suratramai['hari']; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: <?= $suratramai['tgl']; ?></td>
        </tr>
        <tr>
            <td>Jam Mulai</td>
            <td>: <?= $suratramai['jam']; ?></td>
        </tr>
        <tr>
            <td>Jam Selesai</td>
            <td>: <?= $suratramai['selesai']; ?></td>
        </tr>
        <tr>
            <td>Acara</td>
            <td>: <?= $suratramai['acara']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $suratramai['alamat']; ?></td>
        </tr>
    </table>

    <p>Demikianlah surat ini dibuat dengan sebenar-benarnya.</p>

    <!-- Tanda Tangan -->
    <div class="footer">
        <p>Jakarta, <?= $tanggal; ?></p>
        <pre>     Lurah   </pre>
        <div class="container">
            <img src="data:image/jpg;base64,<?= $image_base60; ?>" alt="Tanda Tangan" style="width: 160px; height: 100px; margin-left: 100px;">
        </div>
        
        <p>H. Suratno S.sos</p>
    </div>
</div>
</body>
</html>
