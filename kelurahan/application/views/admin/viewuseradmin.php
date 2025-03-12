
<!-- Google Fonts -->


<br>


<?= $this->session->flashdata('pesan'); ?>
<div class="suka" style='height: 0vh;' >
      <div class="container" style="height: 100%;
      overflow: auto;">
     </div>
    
<pre>
<table class="table" style="max-height: 200px; max-width: 900px; margin-left:15px; color:black;">
  <thead class="thead-dark">
      <th colspan="6" align="center"> Data User</th>
      <th colspan="10" > <input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini..."></th>
      <tr>
      <td>no</td>
      <td>email</td>
      <td>nama lengkap</td>
      <td>nik</td>
      <td>alamat</td>
      <td >no telepon</td>
      <td>status</td>
      <td>update</td>
      <td>hapus</td>
    
     
    </tr>
     
      
    
  </thead>

  <tbody>

    <?php
    $i=1; foreach ($user1 as $user1){ ?>
    <tr >
      
      <td><?=$i++?></td>
      <td><?= $user1['email']; ?></td>
      <td><?= $user1['namalengkap']; ?></td>
      <td><?= $user1['nik']; ?></td>
      <td><?= $user1['alamat']; ?></td>
      <td><?= $user1['notelepon']; ?></td>
      <td><?php $status=$user1['status'];
      if ($status=="verfikasi"){
        echo "<div class='badge badge-success'>verfikasi</div>";

    
      }else{
        echo "<div class='badge badge-danger'>belum verfikasi</div>";
      } ?>
    </td>
    <td><a href="<?= base_url('admin/detailuser/'.$user1['nik']); ?>" class="btn btn-warning"style="color:white;">update</td>
    <td><a href="<?= base_url('admin/hapususer/'.$user1['nik']); ?>" class="btn btn-danger">Hapus</td>
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