
<br><br>


<section >



<div class="container" style=" box-shadow:  3px 5px 5px 3px rgba(0, 0, 0, 0.2);max-width: 820px; background-color: white"><br>
<?= $this->session->flashdata('pesan'); ?>
<h2 style="text-align: center; color:black;">Detail Sktm</h2>

<table colspan="10" rowspan="2" style="color:black;margin-left: 20px" >
    <br>
    
</tr>
    <tr >
        <td colspan="1">Email</td>
        <td>: <?= $sktm['email']; ?></td>
    </tr>
    <tr>
        <td>NIK </td>
        <td> : <?= $sktm['nik']; ?></td>
    </tr>
    <tr>
        <td>No Telepon</td>
        <td>: <?= $sktm['notelepon']; ?></td>
    </tr>
   
    <tr>
        <td>Alasan</td>
        <td>: <?= $sktm['alasan']; ?></td>
    </tr>
  
    <tr>
        <td>Tanggal Input</td>
        <td>: <?= $sktm['tglinput']; ?></td><td><h5>update surat</h5></td>
    </tr>
    <form action="<?= base_url('adminsurat/updatesktm'); ?>" method="post">
    <tr>
        <td>Status</td>
        <input type="text" name="nosurat" id="nosurat" hidden value="<?=$sktm['nosurat'];?>">
        <td>: <?= $sktm['status']; ?></td>
        <td>       <select name="status" id="status"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
 
                        <option value="belum disetujui" required> Belum disetujui</option>
                        <option value="disetujui" required> disetujui</option>
                        <option value="ditolak"required> ditolak</option>
                    </select></td>
    </tr>
    <tr>
        <td>alasan</td>
        <td>: <?= $sktm['alasan']; ?></td>
        <td>
            <input type="text" name="alasan" id="alasan" placeholder="masukan alasan">
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
<br>
<br>
<br>





</div>
  </div>

</section>


<br>


 
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>