


<section>


  

<br>




<pre>
<a style="margin-left:10px;"href="<?= base_url('adminsurat/export_excel_suratramai'); ?>" class="btn btn-success"><i class="far fa-file-excel"></i> Excel</a>

<table class="table" style="max-height: 200px; color:black; ">
       
  <thead class="thead-dark">
    
      <th colspan="2" align="center">  Surat Ramai</th>
      <th colspan="10"> <input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini..."></th>


      <tr>
      <td>no surat</td>
      <td>nik</td>
      <td>no telepon</td>
      <td >hari</td>
      <td>tanggal </td>
      <td>jam</td>
      <td>selesai</td>
      <td>acara</td>
      <td>alamat</td>
      <td>status</td>
      <td>alasan</td>
      <td>lihat detail</td>
    </tr>
     
      
    
  </thead>

<tbody>

    <?php foreach ($suratramai as $suratramai){ ?>
    <tr >
 

      <td><?= $suratramai['nosurat']; ?></td>
      <td><?= $suratramai['nik']; ?></td>
      <td><?= $suratramai['notelepon']; ?></td>
      <td><?= $suratramai['hari']; ?></td>
      <td><?= $suratramai['tgl']; ?></td>
      <td><?= $suratramai['jam']; ?></td>
      <td><?= $suratramai['selesai']; ?></td>
      <td><?= $suratramai['acara']; ?></td>
      <td><?= $suratramai['alamat']; ?></td>
      <td><?php $status=$suratramai['status'];
      if ($status=="disetujui"){
        echo "<div class='badge badge-success'>Disetujui</div> ";?>
     
<?php
      }elseif($status=="belum disetujui"){
        echo "<div class='badge badge-warning' style='color:white;'>Belum Disetujui</div>";
      ?>
      <td>-</td>
      <?php 
      }else{
        echo "<div class='badge badge-danger'>ditolak</div>";
      } ?>
      <td><?= $suratramai['alasan']; ?></td>
      
      <td><a href="<?= base_url('adminsurat/detailsuratramai/'.$suratramai['nosurat']); ?>" class="btn btn-primary"style="color:white;">detail</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</pre>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
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
</section>

  
    
