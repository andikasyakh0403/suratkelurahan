
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
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
<form class="user" method="post" action="<?= base_url('admin/simpancarousel'); ?> "enctype="multipart/form-data">
        <div class="form-group"style="max-height: 200px; max-width: 900px; margin-left:15px;">
        Pilih file: <input type="file" name="berkas"   required/>
        </div>
        <div class="form-group">
            <textarea class="form-control form-control" style="max-height: 200px; max-width: 900px; margin-left:15px;" name="keterangan"
                id="keterangan" placeholder="keterangan"required maxlength="200"></textarea>
        </div>
        <div class="form-group" style="max-height: 200px; max-width: 400px; margin-left:15px;">
        <button type="submit" class="btn btn-primary  btn-block">
                                     upload
                                    </button>
        </div>
 </form>
<?= $this->session->flashdata('ditambahkan'); ?>

<table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px;">
  <thead class="thead-dark">
      <th colspan="4"> Berita Carousel</th>
     
      
    
  </thead>

  <tbody>
    <tr>
      <td>no</td>
      <td>Gambar</td>
      <td>Keterangan</td>
      <td>aksi</td>
    </tr>
    <?php
$a=0;
foreach ($carousel as $carousel){ ?>

    <tr>
      
      <td><?= $a=$a+1; ?></td>
      <td ><img src="<?= base_url('assets/img/profile/'.$carousel['foto']); ?>" alt="" srcset="" height='125px' weidth='120px'> </td>
      <td><?= $carousel['keterangan']; ?></td>
      <td><a href="<?= base_url('admin/hapuscarousel/'.$carousel['idcarousel']); ?>" class="btn btn-danger">Hapus</td>
    </tr>
    <?php } ?>
  </tbody>
</table>

 
  
</div>
<br>

  
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>