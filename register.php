    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <br>
    <br>
    <style>
    body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.btn-outline {
    background-color: transparent;
    color: inherit;
    transition: all .5s;
}

.btn-primary.btn-outline {
    color: #428bca;
}

.btn-success.btn-outline {
    color: #5cb85c;
}

.btn-info.btn-outline {
    color: #5bc0de;
}

.btn-warning.btn-outline {
    color: #f0ad4e;
}

.btn-danger.btn-outline {
    color: #d9534f;
}

.btn-primary.btn-outline:hover,
.btn-success.btn-outline:hover,
.btn-info.btn-outline:hover,
.btn-warning.btn-outline:hover,
.btn-danger.btn-outline:hover {
    color: #fff;
}
</style>
<div class="container">
    <div class="row">
        <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 
         <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Pendaftaran</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="login.php">Login</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                    <?php
if(isset($_POST['logins'])){
    include 'koneksi.php';
@$user = $_POST['username'];
@$pass = $_POST['password'];
@$noinduk=$_POST['noinduk'];
 @$namad        = $_POST['firstname'];   
 @$namab      = $_POST['lastname'];   
  @$email      = $_POST['email'];  
   @$alamat    = $_POST['alamat'];
   @$bulan = $_POST['bulan'];
   @$tanggal = $_POST['tanggal'];
   @$tahun = $_POST['tahun'];
   @$kelamin = $_POST['gender'];
   @$notelp = $_POST['notelp'];
   @$sumber= $_FILES['gambar']['tmp_name'];
@$target= 'img/';
@$nama_gambar=$_FILES['gambar']['name'];
@$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
@$input=mysql_query("insert into user values('$user', md5('$pass'),'$noinduk','Murid','$namad','$namab','$email','$alamat','$notelp','$bulan','$tanggal','$tahun','$kelamin','$nama_gambar')");
if($input ){
        
  echo' <div class="alert alert-warning">
  <strong>Selamat !</strong> Anda Sudah terdaftar silahkan <a href="login.php">login</a> 
</div>';
        
        
    }else{
        
       echo' <div class="alert alert-danger">
  <strong>Gagal!</strong> Cek data yang anda masukan 
</div>';
    }

}else{  //jika tidak terdeteksi tombol tambah di klik

    //redirect atau dikembalikan ke halaman tambah
   


}
?>
            <form action="" method="post" class="form" role="form" enctype="multipart/form-data">
             <input class="form-control" name="username" placeholder="Username" type="text" autofocus />
            <input class="form-control" name="password" placeholder="New Password" type="password" />
            <input class="form-control" name="noinduk" placeholder="No induk" type="text"
                        required  />
           
                <div class="row">      
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="firstname" placeholder="Nama Depan" type="text"
                        required  />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="lastname" placeholder="Nama Belakang" type="text" required />
                </div>
                </div>
          
            <input class="form-control" name="email" placeholder=" Email" type="email" />
            <div class="form-group">
    <textarea class="form-control" placeholder="Alamat" name="alamat"></textarea>
</div>
     <div class="form-group">
    <input class="form-control" placeholder="No Telp / HP" name="notelp" type="text"></input>
</div>
            
            <label for="">
                Tanggal Lahir</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="bulan">
                        <option value="Januari">Januari</option>
                        <option value="February">February</option>
                         <option value="Maret">Maret</option>
                          <option value="April">April</option>
                           <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                             <option value="Juli">Juli</option>
                              <option value="Agustus">Agustus</option>
                               <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                 <option value="November">November</option>
                                  <option value="Desember">Desember</option>

                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="tanggal">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>

                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <input type="text" name="tahun" placeholder="Tahun" class="form-control"></input>
                </div>
            </div>
           
                    <select class="form-control" name="gender">
                        <option value="Laki-Laki" >Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                

            <br />
            <br>
            <label for="exampleInputFile">Foto</label>
    <input type="file" name="gambar" required="">
                <br>
                <br>
            <button class="btn btn-lg btn-primary btn-outline btn-block" type="submit" name="logins">
                Daftar</button>
            </form>
        </div>
    </div>

</div>


<script>
function myFunction() {
    alert("I am an alert box! <a href="tambah.php">Kembali</a>");
}
</script> 