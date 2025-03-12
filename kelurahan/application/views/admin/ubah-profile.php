
<br>


<section >


<center>
<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);width: 520px; background-color: white"><br>
<?= $this->session->flashdata('pesan'); ?>
<img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" style="width: 100px; height: 90px"><br>
 

<table colspan="2" rowspan="2" >
    <tr>
    <th  colspan="2" align="center"> <font style="margin-left: 120px">Biodata</font></th>
    
    <tr >
        <td>Email</td>
        <td>: <?= $user['email']; ?></td>
    </tr>
    <tr>
        <td>NIK </td>
        <td> : <?= $user['nik']; ?></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td> : <?= $user['namalengkap']; ?></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td>: <?= $user['nip']; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?= $user['alamat']; ?></td>
    </tr>
    <tr>
        <td>No telepon</td>
        <td>: <?= $user['notelepon']; ?></td>
    </tr>
    
    
</table>
<br>
  <b>Ubah Password</b>


<form action="<?= base_url('admin/ubahPassword'); ?>" method="post"  style='max-width:420px;'>
    <div class="form-gorup" align="left">
        <label for="password_sekarang" >Password Saat ini</label>
        <input type="password" class="form-control" id="password_sekarang" name="password_sekarang">
        <?= form_error('password_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-gorup" align="left">
        <label for="password_baru1">Password Baru</label>
        <input type="password" class="form-control" id="password_baru1" name="password_baru1">
        <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-gorup" align="left">
        <label for="password_baru2">Ulangi Password </label>
        <input type="password" class="form-control" id="password_baru2" name="password_baru2">
        <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary mt-3">Ubah Password</button>
    </div>
</form>
<br>
  </center>


</div>
  </div>

</section>


<br>


 
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>