<?php
session_start();
include 'crudnilai/update.php';
include 'koneksi.php';
if (!isset($_SESSION['username'])) {
	header('location: login.php');
}
?>
<?php if(isset($_GET['data'])){ ?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        
          <form id="fileForm" class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
          <fieldset>
            <legend class="text-center"> INPUT MATERI</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="sk">SK</label>
              <div class="col-md-9">
                <textarea class="form-control" id="sk" name="sk" placeholder="Standar Kompetensi" rows="5" required></textarea>
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="kd">KD</label>
              <div class="col-md-9">
                <textarea class="form-control" id="kd" name="kd" placeholder="Kompetensi Dasar" rows="5" required></textarea>
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="Pertemuan">Pertemuan</label>
              <div class="col-md-9">
                <select class="form-control" name="pertemuan">
                <option>Pilih Pertemuan</option>
                        <option value="Pertama">Pertama</option>
                        <option value="Kedua">Kedua</option>
                         <option value="Ketiga">Ketiga</option>
                          <option value="Keempat">Keempat</option>
                           <option value="Kelima">Kelima</option>
                            <option value="Keenam">Keenam</option>
                             <option value="Ketujuh">Ketujuh</option>
                              

                    </select>
              </div> 
              </div>
              <div class="form-group">
              <label class="col-md-3 control-label" for="materi">Materi</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="materi" name="materi" placeholder="Materi" required>
              </div>
            </div>
            
              <div class="form-group">
              <label class="col-md-3 control-label" for="materi">File</label>
              <div class="col-md-9">
                <input type="file" name="file" title="File type : docx / pdf / pptx / mp4" class="form-control" required="">
                <script>

</script>
            </div>
            </div>
            <div class="col-md-9 col-md-offset-3">
            <button class="btn btn-lg btn-primary btn-outline btn-block"  type="submit" name="submit">
                Simpan</button>
            <a href="index.php"   type="button" class="btn btn-outline btn-block btn-lg btn-danger ">Kembali</a>
             </div>
             </fieldset>
             </form>
             </div>
             </div>
             <hr>
             <div class="container">
<table  class="table table-bordered " id="example">
	<thead>
		<tr align="center" class="info">
			<td><strong>No</td>
			<td><strong>SK</td>
			<td><strong>KD</td>
			<td><strong>Pertemuan</td>
			<td><strong>Materi</td>
			<td><strong>Aksi</td>


		</tr>
	</thead>
	<tbody>
<?php
	$sql="select * from materi order by pertemuan desc"; //'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
	@$rs=mysql_query($sql); 
	@$no=1;
	while(@$row=mysql_fetch_array($rs)){
?>
<tr>
	
	<td align="center"><?php echo $row['0']; ?></td>
	<td align="center"><?php echo $row['1']; ?></td>
	<td align="center"><?php echo $row['2']; ?></td>
	<td align="center"><?php echo $row['3']; ?></td>
	<td align="center"><?php echo $row['4']; ?></td>

	
	

<!-- edit dan hapus ini jangan di rubah, biar enak, usahakan setiap nama id pakai id saja, jangan ada embel2 lain -->
	<td align="center">
		<a href="?edit&id=<?php echo $row['0']; ?>" class="btn btn-outline btn-warning"><span class="glyphicon glyphicon-edit"></span></a> 
		<a href="?hapus&id=<?php echo $row['0']; ?>" onclick="return confirm('Yakin Mau Hapus?');" class="btn btn-outline btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
	</td>
<!-- INI BATASNYA -->
</tr>
<?php $no++; } ?>
	</tbody>
</table>
</div>
<?php
if(isset($_POST['submit'])){
		$sk=$_POST['sk'];
		$kd=$_POST['kd'];
		$pertemuan=$_POST['pertemuan'];
		$materi=$_POST['materi'];
		@$sumber= $_FILES['file']['tmp_name'];
@$target= 'materi/';
@$nama_gambar=$_FILES['file']['name'];
@$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
		
	$sql="insert into materi VALUES ('','$sk','$kd','$pertemuan','$materi','$nama_gambar')";//'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
	if(mysql_query($sql)){
	echo '<script type="text/javascript">
		//<![CDATA[
		alert ("Berhasil Simpan");
		window.location="?data";
		//]]>
	</script>';
	} else {
	echo '<script type="text/javascript">
		//<![CDATA[
		alert ("Gagal Simpan");
		window.location="?data";
		//]]>
	</script>';}
		}
	
      
?>
<?php } ?>
<?php
	if(isset($_GET['hapus'])){
		$sk=$_GET['id'];
		$sql="delete from materi where no='$sk'"; //'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
		mysql_query($sql);
		echo '<script type="text/javascript">
			//<![CDATA[
			window.location="?data"
			//]]>
		</script>';
	}

?>

<?php if(isset($_GET['edit'])){ ?>
<?php
include 'koneksi.php'; 
$sql="select * from materi where no='$_GET[id]'";//'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
 { ?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        
          <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
          <fieldset>
            <legend class="text-center"> EDIT MATERI</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="sk">SK</label>
              <div class="col-md-9">
                <textarea class="form-control" id="sk" name="sk"  rows="5" value="" required><?php echo $row['1'];?></textarea>
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="kd">KD</label>
              <div class="col-md-9">
                <textarea class="form-control" id="kd" name="kd" placeholder="Kompetensi Dasar" rows="5" required><?php echo $row['2'];?></textarea>
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="Pertemuan">Pertemuan</label>
              <div class="col-md-9">
                <select class="form-control" name="pertemuan">
                <option>Pilih Pertemuan</option>
                        <option value="Pertama" <?php if ($row['3'] == 'Pertama') echo ' selected="selected"'?>>Pertama</option>
                        <option value="Kedua"<?php if ($row['3'] == 'Kedua') echo ' selected="selected"'?>>Kedua</option>
                         <option value="Ketiga">Ketiga <?php if ($row['3'] == 'Ketiga') echo ' selected="selected"'?></option>
                          <option value="Keempat"<?php if ($row['3'] == 'Keempat') echo ' selected="selected"'?>>Keempat</option>
                           <option value="Kelima"<?php if ($row['3'] == 'Kelima') echo ' selected="selected"'?>>Kelima</option>
                            <option value="Keenam"<?php if ($row['3'] == 'Keenam') echo ' selected="selected"'?>>Keenam</option>
                             <option value="Ketujuh" <?php if ($row['3'] == 'Ketujuh') echo ' selected="selected"'?>>Ketujuh</option>
                              

                    </select>
              </div> 
              </div>
              <div class="form-group">
              <label class="col-md-3 control-label" for="materi">Materi</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="materi" name="materi" placeholder="Materi" required value="<?php echo $row['4'];?>">
              </div>
            </div>
            
              <div class="form-group">
              <label class="col-md-3 control-label" for="materi">File</label>
              <div class="col-md-9">
                <input type="file" name="file"  class="form-control" required>
                <script>

</script>
            </div>
            </div>
            <div class="col-md-9 col-md-offset-3">
            <button class="btn btn-lg btn-primary btn-outline btn-block"  type="submit" name="submit">
                Simpan</button>
            <input onClick="javascript:history.go(-1)" type="submit" name="Back" value="Back" class="btn btn-danger btn-lg btn-outline btn-block"/>
             </div>
             </fieldset>
             </form>
             </div>
             </div>
             <?php	} if(isset($_POST['submit'])){
		$no=$_GET['id'];
		$sk=$_POST['sk'];
		$kd=$_POST['kd'];
		$pertemuan=$_POST['pertemuan'];
		$materi=$_POST['materi'];
		@$sumber= $_FILES['file']['tmp_name'];
@$target= 'materi/';
@$nama_gambar=$_FILES['file']['name'];
@$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
		
		
		@$sql="update materi set sk='$sk', kd='$kd', pertemuan='$pertemuan', materi='$materi', file='$nama_gambar'  where no='$no'";//'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
	if(mysql_query($sql)){
	echo '<script type="text/javascript">
		//<![CDATA[
		alert ("Berhasil Edit");
		window.location="?data";
		//]]>
	</script>';
	} else {
	echo '<script type="text/javascript">
		//<![CDATA[
		alert ("Gagal Simpan");
		window.location="?data";
		//]]>
	</script>';}
		}
 ?>
<!-- INI BATASNYA EDIT -->

<!-- INI KALAU MAU NAMBAH -->

 	

} 
<?php } ?>
<?php include 'crudnilai/ipdate.php'?>

