<?php
session_start();
include 'crudnilai/update.php';
include 'koneksi.php';
if (!isset($_SESSION['username'])) {
	header('location: login.php');
}
?> 
<?php if(isset($_GET['data'])){ ?>
<center><h3><strong>INPUT NILAI</strong></h3></center> 
<br>

<div class="container">
<div class="row">
<form action="" method="post" class="niceform" enctype="multipart/form-data">
<table class="table">
	
		<tr>
			<td align="center"><strong>No</strong></td>
			<td><div class="col-md-4"><input type="text" name="no" id="customerAutocomplte" placeholder="No Induk" class="ui-autocomplete-input form-control" autocomplete="off" required/></div></td>
			<script>
			  $(document).ready(function($){
				$('#customerAutocomplte').autocomplete({
			  source:'proses.php', 
			  minLength:1,
			  select: function ( event, ui ) {
				$("#nama").val( ui.item.nm );
				$("#jenis").val( ui.item.jn );
				}
				});
			});
			</script>
		</tr>
		<tr>
			<td align="center"><strong>Nama</strong></td>
			<td><div class="col-md-4" ><input type="text" name="nama" placeholder="Nama" id="nama" class="form-control"required/></div></td>
		</tr>
		<tr>
			<td align="center"><strong>Jenis Kelamin</strong></td>
			<td><div class="col-md-4"><input type="text" name="jenis" id="jenis" placeholder="Jenis Kelamin" class="form-control"required/></div></td>
			
		</tr>
		<tr>
			<td align="center"><strong>Nilai Harian<strong></td>
			<td><div class="col-md-2"><input type="text" name="hari" placeholder="Nilai" onchange="hitung2()" id="hari" class="form-control"required/></div></td>
			
		</tr>
		<tr>
		<tr>
			<td align="center"><strong>Nilai UTS<strong></td>
			<td><div class="col-md-2"><input type="text" name="uts" placeholder="Nilai" onchange="hitung2()" id="uts" class="form-control"required/></div></td>
			
		</tr>
		<tr>
			<td align="center"><strong>Nilai UAS<strong></td>
			<td><div class="col-md-2"><input type="text" name="uas" id="uas" placeholder="Nilai" onchange="hitung2()" class="form-control"required/></div></td>
			<script> function hitung2() {
				var a = $("#hari").val();
				var b = $("#uts").val();
				var c = $("#uas").val();
				var d = 3;
				e = (parseInt(a) + parseInt(b) + parseInt(c)) / 3; //a kali b
				$("#rata").val(e);
			}
			</script>
		</tr>
		<tr>
			<td align="center"><strong>Nilai Rata - Rata<strong></td>
			<td><div class="col-md-2"><input type="text" name="rata" placeholder="Nilai" id="rata"  class="form-control"required/></div></td>
			
		</tr>
		<tr>
			<td align="center"><strong>Keterangan<strong></td>
			<td><div class="col-md-4"><input type="text" name="ket" id="ket" placeholder="Keterangan" class="form-control"required/></div></td>
			
		</tr>
			<td>&nbsp;</td>
			<td><a href="index.php"   type="button" class="btn btn-outline btn-lg btn-danger ">Kembali</a> <input type="submit" name="submit" value="Simpan" class="btn btn-lg btn-primary btn-outline"/></td>
		</tr>
	</table>
</form>
</div>
</div>
<br /><br />
<div class="container">
<table  class="table table-bordered " id="example">
	<thead>
		<tr align="center">
			<td>No</td>
			<td>Nama</td>
			<td>Jenis Kelamin</td>
			<td>Nilai Harian</td>
			<td>Nilai UTS</td>
			<td>Nilai UAS</td>
			<td>Nilai Rata-Rata</td>
			<td>Keterangan</td>
			<td>Aksi</td>


		</tr>
	</thead>
	<tbody>
<?php
	$sql="select * from nilaimurid order by no desc"; //'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
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
	<td align="center"><?php echo $row['5']; ?></td>
	<td align="center"><?php echo $row['6']; ?></td>
	<td align="center"><?php echo $row['7']; ?></td>

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
<!-- INI BATASNYA DATANYA -->
<?php
if(isset($_POST['submit'])){
		$no=$_POST['no'];
		$nama=$_POST['nama'];
		$jenis=$_POST['jenis'];
		$hari=$_POST['hari'];
		$uts=$_POST['uts'];
		$uas=$_POST['uas'];
		$rata=$_POST['rata'];
		$ket=$_POST['ket'];
		
	$sql="insert into nilaimurid VALUES ('$no','$nama','$jenis','$hari','$uts','$uas','$rata','$ket')";//'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
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


<!-- INI KALAU MAU HAPUS -->

<?php
	if(isset($_GET['hapus'])){
		$no=$_GET['id'];
		$sql="delete from nilaimurid where no='$no'"; //'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
		mysql_query($sql);
		echo '<script type="text/javascript">
			//<![CDATA[
			window.location="?data"
			//]]>
		</script>';
	}
?>

<!-- INI BATASNYA HAPUS -->

<!-- INI KALAU MAU EDIT -->
<?php if(isset($_GET['edit'])){ ?>
<?php
$sql="select * from nilaimurid where no='$_GET[id]'";//'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
 { ?>
 <div class="container">
 </div class="col-md-3">
<form action="" method="post" class="niceform" enctype="multipart/form-data">

<table class="table" >
	<tr class="warning">
		<td align="center" colspan="2" ><h3><strong>EDIT DATA</strong></h3></td>
	</tr>		
	<tr>
			<td align="center"><strong>No</strong></td>
			<td><div class="col-md-4"><input type="text" name="no"  value="<?php echo $row['0'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td align="center"><strong>Nama</strong></td>
			<td><div class="col-md-4"><input type="text" name="nama"  value="<?php echo $row['1'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td align="center"><strong>Jenis Kelamin</strong></td>
			<td><div class="col-md-4"><input type="text" name="jenis"  value="<?php echo $row['2'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td align="center"><strong>Nilai Harian</strong></td>
			<td><div class="col-md-2"><input type="text" name="hari"  value="<?php echo $row['3'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td align="center"><strong>Nilai UTS</strong></td>
			<td><div class="col-md-2"><input type="text" name="uts"  value="<?php echo $row['4'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td align="center"><strong>Nilai UAS</strong></td>
			<td><div class="col-md-2"><input type="text" name="uas"  value="<?php echo $row['5'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td align="center"><strong>Nilai Rata - Rata</strong></td>
			<td><div class="col-md-2"><input type="text" name="rata"  value="<?php echo $row['6'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td align="center"><strong>Keterangan</strong></td>
			<td><div class="col-md-4"><input type="text" name="ket"  value="<?php echo $row['7'];?>" required class="form-control"/></div></td>
	</tr>
	<tr>
			<td>&nbsp;</td>
			<td><input onClick="javascript:history.go(-1)" type="submit" name="Back" value="Back" class="btn btn-danger	"/> <input type="submit" name="submit" value="Update" class="btn btn-primary"/> </td>
			
	</tr>
</table>
</form>
</div>
</div>
<?php	} if(isset($_POST['submit'])){
		$no=$_POST['no'];
		$nama=$_POST['nama'];
		$jenis=$_POST['jenis'];
		$hari=$_POST['hari'];
		$uts=$_POST['uts'];
		$uas=$_POST['uas'];
		$rata=$_POST['rata'];
		$ket=$_POST['ket'];
		$sql="update nilaimurid set nama='$nama', kelamin='$jenis', nh='$hari', nuts='$uts', nuas='$uas', rata='$rata', ket='$ket' where no='$no'";//'KATEGORI' adalah nama tabel ubahlah jika nama tabel berbeda
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
<?php } 



include 'crudnilai/ipdate.php'?>



