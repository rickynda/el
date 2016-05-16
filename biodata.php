<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/blitzer/jquery-ui-1.10.3.custom.css" type="text/css" media="" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"
    href="js/jquery-ui.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.autocomplete.js" />
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"</script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
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
<style>
  .user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}




</style>
 

<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel ">
            <div class="panel-heading">
   
<?php

$username=($_SESSION['username']);

@$sql= 'select * from user where username="'.$username.'"';


include 'koneksi.php';


$ambildata = mysql_query( $sql);
if(! $ambildata )
{
  die('Gagal ambil data: ' . mysql_error());
}
$row = mysql_fetch_array($ambildata, MYSQL_ASSOC);


    
?>




       <h1 class="panel-title" align="right"><strong>Biodata Diri </strong></h1>
            </div>
            

            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="img/<?php echo $row['foto']; ?>" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        
                        <td width="400"><strong>Nomor Induk</td>
                        <td><strong><?php echo $row['no_induk']; ?></strong></td>
                       
                      </tr>
                      <tr>
                        <td>Nama Depan</td>
                        <td><?php echo $row['namadepan']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama Belakang</td>
                        <td><?php echo $row['namabelakang']; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td><?php echo $row['bulan']; echo"/";  echo $row['tanggal']; echo "/"; echo $row['tahun']; ?></td>
                      </tr>
                   <tr>
                        <td>Email</td>
                        <td><?php echo $row['email']; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Jeni Kelamin</td>
                        <td><?php echo $row['kelamin']; ?></td>
                      </tr>
                        <tr>
                        <td>Alamat</td>
                        <td><?php echo $row['alamat']; ?></td>
                      </tr>
                      
                        <td>No Telp</td>
                        <td><?php echo $row['notelp'];  ?></td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-outline btn-primary " >Edit Profile</a>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        
                            <a href="index.php" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-outline btn-danger ">Kembali</a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>