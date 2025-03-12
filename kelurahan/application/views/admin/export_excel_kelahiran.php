<?php  
date_default_timezone_set('Asia/Jakarta');
 $a=date('d-m-Y');
  header ("Cache-Control: no-cache, must-revalidate");

    header ("Pragma: no-cache");

    header ("Content-type: application/x-msexcel");

    header ("Content-type: application/octet-stream");

    header ("Content-Disposition: attachment; filename=suratkelahiran_$a.xls");

?>



<h3><center>Laporan Pengajuan Surat Kelahiran</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 


    <td>no surat</td>
      <td>nik</td>
      <td>nama anak</td>
      <td>hari lahir</td>
      <td >tanggal lahir</td>
      <td>jam lahir</td>
      <td>tempat lahir</td>
      <td>anak ke</td>
      <td>nama ibu</td>
      <td>nama ayah</td>
      <td>tanggal input</td>
      <td>jenis kelamin</td>
      <td>status</td>
    
			 
			

		</tr> 

	</thead> 

	<tbody> 
  <?php foreach ($suratkelahiran as $suratkelahiran){ ?>
    <tr >
      
      <td><?= $suratkelahiran['nosurat']; ?></td>
      <td><?= $suratkelahiran['nik']; ?></td>
      <td><?= $suratkelahiran['namaanak']; ?></td>
      <td><?= $suratkelahiran['harilahir']; ?></td>
      <td><?= $suratkelahiran['tgllahir']; ?></td>
      <td><?= $suratkelahiran['jamlahir']; ?></td>
      <td><?= $suratkelahiran['tempatlahir']; ?></td>
      <td><?= $suratkelahiran['anakke']; ?></td>
      <td><?= $suratkelahiran['namaibu']; ?></td>
      <td><?= $suratkelahiran['namaayah']; ?></td>
      <td><?= $suratkelahiran['tglinput']; ?></td>
      <td><?= $suratkelahiran['jeniskelamin']; ?></td>
      <td><?= $suratkelahiran['status']; ?></td>
      
      </td>
    
    <?php } ?>
   

	</tbody> 

</table> 

