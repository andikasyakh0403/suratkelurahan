<?php  
date_default_timezone_set('Asia/Jakarta');
 $a=date('d-m-Y');
  header ("Cache-Control: no-cache, must-revalidate");

    header ("Pragma: no-cache");

    header ("Content-type: application/x-msexcel");

    header ("Content-type: application/octet-stream");

    header ("Content-Disposition: attachment; filename=suratkematian_$a.xls");

?>



<h3><center>Laporan Pengajuan Surat Kematian</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 


			<th>no surat</th> 

			<th>nik</th> 

			<th>hari</th>

			<th>jam</th> 

			<th>tanggal kematian</th> 

			<th>alasan</th> 
			<th> surat keterangan</th> 
			<th> tempat kubur</th> 
			<th> tanggal input</th> 
			 
			

		</tr> 

	</thead> 

	<tbody> 

	<?php foreach ($kematian as $kematian){ ?>
    <tr >
      
      <td><?= $kematian['nosurat']; ?></td>
      <td><?= $kematian['nik']; ?></td>
      <td><?= $kematian['hari']; ?></td>
      <td><?= $kematian['jam']; ?></td>
      <td><?= $kematian['tglkematian']; ?></td>
      <td><?= $kematian['alasan']; ?></td>
      <td><a download="" href="<?= base_url('assets/img/file/'.$kematian['suratketerangan']); ?>">download</a></td>
      <td><?= $kematian['tempatkubur']; ?></td>
      <td><?= $kematian['tglinput']; ?></td>
      <td>
      
</td>
      <?php 
    
	 } ?>
   

	</tbody> 

</table> 

