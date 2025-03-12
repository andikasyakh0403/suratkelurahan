


<section>


  

<br>

<center>
<div class="container">
<table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px; color:black;">
  <thead class="thead-dark">
      <th colspan="12"> Surat Kematian</th>
     
      
    
  </thead>
<?= $this->session->flashdata('pesan'); ?>
  <tbody>
    <tr>
      <td>no surat</td>
      <td>nik</td>
      <td>hari</td>
      <td>jam</td>
      <td >tanggal kematian</td>
      <td>alasan</td>
      <td>surat keterangan</td>
      <td>tempat kubur</td>
      <td>tanggal input</td>
      <td>update</td>
      <td>hapus</td>
    </tr>
    <?php foreach ($kematian as $kematian){ ?>
    <tr >
      
      <td><?= $kematian['nosurat']; ?></td>
      <td><?= $kematian['nik']; ?></td>
      <td><?= $kematian['hari']; ?></td>
      <td><?= $kematian['jam']; ?></td>
      <td><?= $kematian['tglkematian']; ?></td>
      <td><?= $kematian['alasan']; ?></td>
      <td><a download="<?= $kematian['suratketerangan']; ?>" href="<?= base_url('assets/img/file/'.$kematian['suratketerangan']); ?>">download</a>
						</td>
      <td><?= $kematian['tempatkubur']; ?></td>
      <td><?= $kematian['tglinput']; ?></td>
      
      <td><a href="<?= base_url('user/updatekematian/'.$kematian['nosurat']); ?>" class="btn btn-warning"style="color:white;">update</td>
      <td><a href="<?= base_url('user/hapuskematian/'.$kematian['nosurat']. '/' . $kematian['nik']); ?>" class="btn btn-danger">Hapus</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</center>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
  

<br>
</section>

  
    
