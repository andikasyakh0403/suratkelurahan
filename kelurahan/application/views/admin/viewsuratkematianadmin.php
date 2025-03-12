
<!-- Google Fonts -->


<br>

<a style="margin-left:10px;"href="<?= base_url('adminsurat/export_excel_kematian'); ?>" class="btn btn-success"><i class="far fa-file-excel"></i> Excel</a>
<br><br>
<?= $this->session->flashdata('pesan'); ?>
<div class="suka" style='height: 0vh;' >
      <div class="container" style="height: 100%;
      overflow: auto;">
     </div>
     <pre>
<table class="table"  style="max-width: 900px; margin-left:15px;" align=>
  <thead class="thead-dark">
      <th colspan="6"> Surat Kematian</th>
      <th colspan="12" > <input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini..."></th>
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
      <td>Keterangan</td>
      <td>status</td>
      <td>Detail</td>

    </tr>
     
      
    
  </thead>
<?= $this->session->flashdata('pesan'); ?>
  <tbody>
    
    <?php foreach ($kematian as $kematian){ ?>
    <tr >
      
      <td><?= $kematian['nosurat']; ?></td>
      <td><?= $kematian['nik']; ?></td>
      <td><?= $kematian['hari']; ?></td>
      <td><?= $kematian['jam']; ?></td>
      <td><?= $kematian['tglkematian']; ?></td>
      <td><?= $kematian['alasan']; ?></td>
      <td><a download="<?= $kematian['suratketerangan']; ?>" href="<?= base_url('assets/img/file/'.$kematian['suratketerangan']); ?>">download</a></td>
      <td><?= $kematian['tempatkubur']; ?></td>
      <td><?= $kematian['tglinput']; ?></td>
      <td><?= $kematian['keterangan']; ?></td>

      
</td>
      <td><?php $status=$kematian['status'];
      if ($status=="disetujui"){
        echo "<div class='badge badge-success'>Disetujui</div>";
      }elseif($status=="belum disetujui"){
        echo "<div class='badge badge-warning' style='color:white;'>Belum Disetujui</div>";
      }
      else{
        echo "<div class='badge badge-danger'>ditolak</div>";
      } ?>
    </td>
 

   
      
      <td><a href="<?= base_url('adminsurat/detailkematian/'.$kematian['nosurat']); ?>" class="btn btn-primary"style="color:white;">detail</td>

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