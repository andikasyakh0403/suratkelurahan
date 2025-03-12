
<!-- Google Fonts -->


<br>

<a style="margin-left:10px;"href="<?= base_url('adminsurat/export_excel_sktm'); ?>" class="btn btn-success"><i class="far fa-file-excel"></i> Excel</a>
<br><br>
<?= $this->session->flashdata('pesan'); ?>
<div class="suka" style='height: 0vh;' >
      <div class="container" style="height: 100%;
      overflow: auto;">
     </div>
     <pre>
<table class="table" id="tabelsktm" style="max-width: 900px; margin-left:15px;" align=>
  <thead class="thead-dark">
      <th colspan="5"> Surat Keterangan tidak Mampu</th>
      <th colspan="10" > <input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini..."></th>
      <tr>
      <td>no surat</td>
      <td>nik</td>
      <td>email</td>
      <td>keperluan</td>
      <td>tglinput</td>
      <td>status</td>
      <td colspan="5">alasan</td>
      <td>detail</td>
    </tr> 
    
  </thead>

  <tbody>
    


<?php foreach($sktm as $sktm){?>
    <tr>
      
      <td><?= $sktm['nosurat']; ?></td>
      <td><?= $sktm['nik']; ?></td>
      <td><?= $sktm['notelepon']; ?></td>

      <td><?= $sktm['keperluan']; ?></td>
      <td><?= $sktm['tglinput']; ?></td>
      <td><?php $status=$sktm['status'];
      if ($status=="disetujui"){
        echo "<div class='badge badge-success'>Disetujui</div>";
      }elseif($status=="belum disetujui"){
        echo "<div class='badge badge-warning' style='color:white;'>Belum Disetujui</div>";
      }
      else{
        echo "<div class='badge badge-danger'>ditolak</div>";
      } ?>
    </td>
      <td colspan="5"><?= $sktm['alasan']; ?></td>
      <td><a href="<?= base_url('adminsurat/detailsktm/'.$sktm['nosurat']); ?>" class="btn btn-primary">Detail</td>
    </tr>
  <?php }?>
 

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