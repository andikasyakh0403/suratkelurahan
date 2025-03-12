
<br><br>


<section >
    <style>
        img:hover{
            height:600px;
            width:900px ;
        }
    </style>



<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);max-width: 820px; background-color: white"><br>
<?= $this->session->flashdata('pesan'); ?>
<h2 style="text-align: center; color:black;">Detail Pengajuan Surat Kematian </h2>

<pre>
<table colspan="10" rowspan="2" style="color:black;margin-left: 20px" >
    <br>
    
</tr>
    <tr >
        <td colspan="1">nosurat</td>
        <td>: <?= $kematian['nosurat']; ?></td>
    </tr>
    <tr>
        <td>NIK </td>
        <td>: <?= $kematian['nik']; ?></td>
    </tr>
  
   
    <tr>
        <td>meninggal hari</td>
        <td>: <?= $kematian['hari']; ?></td>
    </tr>
    <tr>
        <td>tanggal kematian</td>
        <td>: <?= $kematian['tglkematian']; ?></td>
    </tr>
    <tr>
        <td>Jam Kematian</td>
        <td>: <?= $kematian['jam']; ?></td>
    </tr>
    <tr>
        <td>alasan</td>
        <td>: <?= $kematian['alasan']; ?></td>
    </tr>
    <tr>
        <td>tempat kubur</td>
        <td>: <?= $kematian['tempatkubur']; ?></td>
    </tr>
    <tr>
        <td>keterangan</td>
        <td>: <?= $kematian['keterangan']; ?></td>
    </tr>
    
    <tr>
        <td>status</td>
        <td>: <?= $kematian['status']; ?></td>
    </tr>
    <tr>
        <td>surat keterangan</td>
        <td>:<img  src="<?= base_url('assets/img/profile/') . $kematian['suratketerangan']; ?>" heigh="200px"width="200px"></td>
    </tr>
    <tr>
        <td>Tanggal Input</td>
        <td>: <?= $kematian['tglinput']; ?></td><td><h5>update surat</h5></td>
    </tr>
    <form action="<?= base_url('adminsurat/updatekematian'); ?>" method="post">
    <tr>
        <td>Status</td>
        <input type="text" name="nosurat" id="nosurat" hidden value="<?=$kematian['nosurat'];?>">
        <td>: <?= $kematian['status']; ?></td>
        <td><select name="status" id="status"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
 
                        <option value="belum disetujui" required> Belum disetujui</option>
                        <option value="disetujui" required> disetujui</option>
                        <option value="ditolak"required> ditolak</option>
                    </select></td>
    </tr>
    <tr>
        <td>alasan</td>
        <td>:<?= $kematian['alasan']; ?></td>
        <td><input type="text" name="keterangan" id="keterangan" placeholder="keterangan" value="<?=$kematian['keterangan'];?>">
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







</div>
  </div>

</section>


<br>


 
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>