<?php  
  header ("Cache-Control: no-cache, must-revalidate");

    header ("Pragma: no-cache");

    header ("Content-type: application/x-msexcel");

    header ("Content-type: application/octet-stream");

    header ("Content-Disposition: attachment; filename=sktm.xls");

?>



<h3><center>Laporan Pengajuan Sktm</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 


			<th>no surat</th> 

			<th>nik</th> 

			<th>no telepon</th>

			<th>Keperluan</th> 

			<th>tanggal input</th> 

			<th>Status</th> 
			<th> Keterangan</th> 
			
			

		</tr> 

	</thead> 

	<tbody> 

	<?php foreach ($sktm as $sktm){ ?>
    <tr >
 

      <td><?= $sktm['nosurat']; ?></td>
      <td><?= $sktm['nik']; ?></td>
      <td><?= "0",$sktm['notelepon']; ?></p></td>
      <td><?= $sktm['keperluan']; ?></td>
      <td><?= $sktm['tglinput']; ?></td>
      <td><?= $sktm['status']; ?></td>
      <td><?= $sktm['alasan']; ?></td>
   
	  <?php }?>

	</tbody> 

</table> 

