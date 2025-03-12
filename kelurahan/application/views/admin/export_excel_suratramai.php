<?php  
date_default_timezone_set('Asia/Jakarta');
 $a=date('d-m-Y');
  header ("Cache-Control: no-cache, must-revalidate");

    header ("Pragma: no-cache");

    header ("Content-type: application/x-msexcel");

    header ("Content-type: application/octet-stream");

    header ("Content-Disposition: attachment; filename=suratramai_$a.xls");

?>



<h3><center>Laporan Pengajuan Surat Ramai</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 


			<th>no surat</th> 

			<th>nik</th> 

			<th>no telepon</th>

			<th>hari</th> 

			<th>tanggal</th> 

			<th>jam mulai</th> 
			<th> jam selesai</th> 
			<th> acara</th> 
			<th> alamat</th> 
			<th> status</th> 
			<th> alasan</th> 
			

		</tr> 

	</thead> 

	<tbody> 

	<?php foreach ($suratramai as $suratramai){ ?>
    <tr >
 

      <td><?= $suratramai['nosurat']; ?></td>
      <td><?= $suratramai['nik']; ?></td>
      <td><?= $suratramai['notelepon']; ?></p></td>
      <td><?= $suratramai['hari']; ?></td>
      <td><?= $suratramai['tgl']; ?></td>
      <td><?= $suratramai['jam']; ?></td>
      <td><?= $suratramai['selesai']; ?></td>
      <td><?= $suratramai['acara']; ?></td>
      <td><?= $suratramai['alamat']; ?></td>
      <td><?=$suratramai['status']; ?>
    </td>
      <td><?= $suratramai['alasan']; ?></td>
	  <?php }?>

	</tbody> 

</table> 

