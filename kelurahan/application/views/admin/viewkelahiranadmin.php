
<!-- Google Fonts -->


<br>

<a style="margin-left:10px;"href="<?= base_url('adminsurat/export_excel_kelahiran'); ?>" class="btn btn-success"><i class="far fa-file-excel"></i> Excel</a>
<br><br>
<?= $this->session->flashdata('pesan'); ?>
<div class="suka" style='height: 0vh;' >
      <div class="container" style="height: 100%;
      overflow: auto;">
     </div>
     <?= $this->session->flashdata('pesan'); ?>
<pre>
<table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px; color:black;">
  <thead class="thead-dark">
      <th colspan="6" align="center"> Pengajuan Surat Kelahiran</th>
      <th colspan="10" > <input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini..."></th>
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
      <td>status</td>
      <td>keterangan</td>
      <td>Detail</td>
     
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
      </td>
     
      <td><a download="<?= $suratkelahiran['suratketerangan']; ?>" href="<?= base_url('assets/img/file/'.$suratkelahiran['suratketerangan']); ?>">download</a></td>
      <td><?php $status=$suratkelahiran['status'];
      if ($status=="disetujui"){
        echo "<div class='badge badge-success'>Disetujui</div> <td></td>";?>
        <?php
      }elseif($status=="belum disetujui"){
        echo "<div class='badge badge-warning' style='color:white;'>Belum Disetujui</div>";
      }
      else{
        echo "<div class='badge badge-danger'>ditolak</div>";
      } ?>
    </td>
      <td><?= $suratkelahiran['keterangan']; ?></td>
      <td><a href="<?= base_url('adminsurat/detailkelahiran/'.$suratkelahiran['nosurat']); ?>" class="btn btn-primary"style="color:white;">Detail</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</pre>

    </div>



<script>
function prosesMenu()
{
	var input = document.getElementById("cariKat");
	var filter = input.value.toLowerCase("");
	var ul = document.getElementsByClassName("left");
	var li = document.querySelectorAll("tbody tr");
	console.log(li)
	for(var i = 0; i<li.length; i++){
		var ahref = document.querySelectorAll("tbody tr")[i];
		if(ahref.innerHTML.toLowerCase().indexOf(filter) > -1){
			li[i].style.display = "";
		}else{
			li[i].style.display = "none";
		}
	}
    
}
</script>


<br>

  
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>