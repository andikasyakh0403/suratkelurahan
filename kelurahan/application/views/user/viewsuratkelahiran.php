


<section>


  

<br>

<center>
<?= $this->session->flashdata('pesan'); ?>
<pre>
<table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px; color:black;">
  <thead class="thead-dark">
      <th colspan="20" align="center"> Pengajuan Surat Kelahiran</th>
     
      
    
  </thead>

  <tbody>
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
      <td>surat keterangan</td>
      <td>update</td>
      <td>hapus</td>
    </tr>
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
     
      <td><a download="<?= $suratkelahiran['suratketerangan']; ?>" href="<?= base_url('assets/img/file/'.$suratkelahiran['suratketerangan']); ?>">download</a></td>
      <td><a href="<?= base_url('user/updatesuratkelahiran/'.$suratkelahiran['nosurat']); ?>" class="btn btn-warning"style="color:white;">update</td>
      <td><a href="<?= base_url('user/hapussuratkelahiran/'.$suratkelahiran['nosurat']); ?>" class="btn btn-danger">Hapus</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</pre>

</center>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
  

<br>
</section>

  
    
