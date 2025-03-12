
<!-- Google Fonts -->

<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
  rel="stylesheet"
/>
<br>
<?= $this->session->flashdata('pesan'); ?>

<center>
<table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px;" align=>
  <thead class="thead-dark">
      <th colspan="10"> Surat Keterangan tidak Mampu</th>
     
      
    
  </thead>

  <tbody>
    <tr>
      <td>no surat</td>
      <td>nik</td>
      <td>notelepon</td>
      <td>email</td>
      <td>keperluan</td>
      <td>tglinput</td>
      <td>status</td>
      <td>alasan</td>
      <td>update</td>
      <td>hapus</td>
    </tr>


<?php foreach($sktm as $sktm){?>
    <tr>
      
      <td><?= $sktm['nosurat']; ?></td>
      <td><?= $sktm['nik']; ?></td>
      <td><?= $sktm['notelepon']; ?></td>
      <td><?= $sktm['email']; ?></td>
      <td><?= $sktm['keperluan']; ?></td>
      <td><?= $sktm['tglinput']; ?></td>
      <td><?php $status=$sktm['status'];
      if ($status=="disetujui"){
        echo "<div class='badge badge-success'>Disetujui</div>";
      }elseif($status=="belum disetujui"){
        echo "<div class='badge badge-warning' style='color:white;'>Belum Disetujui</div>";
      }
      else{
        echo "<div class='badge badge-danger'>ditolak</div>";
      } ?>
    </td>
      <td><?= $sktm['alasan']; ?></td>
      <td><a href="<?= base_url('user/updatesktm/'.$sktm['nosurat']); ?>" class="btn btn-warning">update</td>
      <td><a href="<?= base_url('user/hapussktm/'.$sktm['nosurat']).'/'.$sktm['nik']; ?>" class="btn btn-danger">Hapus</td>
    </tr>
  <?php }?>
  </tbody>
</table>
</center>

 
  

<br>

  
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>