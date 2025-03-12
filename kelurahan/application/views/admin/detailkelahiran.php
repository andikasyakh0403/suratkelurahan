
<br><br>


<section >
  



<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);max-width: 820px; background-color: white"><br>
<?= $this->session->flashdata('pesan'); ?>
<h2 style="text-align: center; color:black;">Detail Pengajuan Akte Kelahiran </h2>

<pre>
<table colspan="10" rowspan="2" style="color:black;margin-left: 20px" >
    <br>
    
</tr>
    <tr >
        <td colspan="1">nosurat</td>
        <td>: <?= $kelahiran['nosurat']; ?></td>
    </tr>
    <tr>
        <td>NIK </td>
        <td>: <?= $kelahiran['nik']; ?></td>
    </tr>
    <tr>
        <td>Nama anak </td>
        <td>: <?= $kelahiran['namaanak']; ?></td>
    </tr>
   
    <tr>
        <td>hari lahir</td>
        <td>: <?= $kelahiran['harilahir']; ?></td>
    </tr>
    <tr>
        <td>tanggal kelahiran</td>
        <td>: <?= $kelahiran['tgllahir']; ?></td>
    </tr>
    <tr>
        <td>jam lahir</td>
        <td>: <?= $kelahiran['jamlahir']; ?></td>
    </tr>
    <tr>
        <td>tempat lahir</td>
        <td>: <?= $kelahiran['tempatlahir']; ?></td>
    </tr>
    <tr>
        <td>anak ke</td>
        <td>: <?= $kelahiran['anakke']; ?></td>
    </tr>
    <tr>
        <td>jenis kelamin</td>
        <td>: <?= $kelahiran['jeniskelamin']; ?></td>
    </tr>
    <tr>
        <td>nama ibu</td>
        <td>: <?= $kelahiran['namaibu']; ?></td>
    </tr>
   
    <tr>
        <td>nama ayah</td>
        <td>: <?= $kelahiran['namaayah']; ?></td>
    </tr>
    <tr>
        <td>status</td>
        <td>: <?= $kelahiran['status']; ?></td>
    </tr>

    <tr>
        <td>surat keterangan</td>
        <td>:<embed src="<?= base_url('assets/img/file/') . $kelahiran['suratketerangan']; ?>" type="application/pdf" width="500px" height="550px" /></td>
    </tr>
    <tr>
        <td>Tanggal Input</td>
        <td>: <?= $kelahiran['tglinput']; ?></td><td><h5>update surat</h5></td>
    </tr>
    <form action="<?= base_url('adminsurat/updatekelahiran'); ?>" method="post">
    <tr>
        <td>Status</td>
        <input type="text" name="nosurat" id="nosurat" hidden value="<?=$kelahiran['nosurat'];?>">
        <td>: <?= $kelahiran['status']; ?></td>
        <td><select name="status" id="status"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
 
                        <option value="belum disetujui" required> Belum disetujui</option>
                        <option value="disetujui" required> disetujui</option>
                        <option value="ditolak"required> ditolak</option>
                    </select></td>
    </tr>
    <tr>
        <td>keterangan</td>
        <td>:<?= $kelahiran['keterangan']; ?></td>
        <td><input type="text" name="keterangan" id="keterangan" placeholder="masukan keterangan">
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
       <td> <input type="submit" value="Update"class="btn btn-warning"placeholder="update" color="white"></td>
    </tr>
    
    </form>
</table>
</pre>
<br>
<br>





</div>
  </div>

</section>


<br>


 
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>