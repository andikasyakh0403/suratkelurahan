


<section>


  

<br>

<?= $this->session->flashdata('pesan'); ?>

<pre>
<table class="table" style="max-height: 200px; color:black; ">
  <thead class="thead-dark">
      <th colspan="50" align="center">  Surat Ramai</th>

     
      
    
  </thead>


    <tr>
      <td>no surat</td>
      <td>nik</td>
      <td>no telepon</td>
      <td>email</td>
      <td >hari</td>
      <td>tanggal </td>
      <td>jam</td>
      <td>selesai</td>
      <td>acara</td>
      <td>alamat</td>
      <td>tanggal input</td>
      <td>status</td>
      <td>alasan</td>
      <td>update</td>
      <td>hapus</td>
    </tr>
    <?php foreach ($suratramai as $suratramai){ ?>
    <tr >
 

      <td><?= $suratramai['nosurat']; ?></td>
      <td><?= $suratramai['nik']; ?></td>
      <td><?= $suratramai['notelepon']; ?></td>
      <td><?= $suratramai['email']; ?></td>
      <td><?= $suratramai['hari']; ?></td>
      <td><?= $suratramai['tgl']; ?></td>
      <td><?= $suratramai['jam']; ?></td>
      <td><?= $suratramai['selesai']; ?></td>
      <td><?= $suratramai['acara']; ?></td>
      <td><?= $suratramai['alamat']; ?></td>
      <td><?= $suratramai['tglinput']; ?></td>
      <td><?php $status=$suratramai['status'];
      if ($status=="disetujui"){
        echo "<div class='badge badge-success'>Disetujui</div>";
      }elseif($status=="belum disetujui"){
        echo "<div class='badge badge-warning' style='color:white;'>Belum Disetujui</div>";
      }
      else{
        echo "<div class='badge badge-danger'>ditolak</div>";
      } ?>
    </td>
      <td><?= $suratramai['alasan']; ?></td>
      
      <td><a href="<?= base_url('user/updatesuratramai/'.$suratramai['nosurat']); ?>" class="btn btn-warning"style="color:white;">update</td>
      <td><a href="<?= base_url('user/hapussuratramai/'.$suratramai['nosurat']).'/'.$suratramai['nik']; ?>" class="btn btn-danger">Hapus</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</pre>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>


<br>
</section>

  
    
