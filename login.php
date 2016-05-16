

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style >
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
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="register.php">Pendaftaran</a></div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >




<form id="flogin" class="form-horizontal" role="form" name="flogin"  method="post" action="">
<?php
if(@$_POST['logins']){

    include('logincek.php');
}

?>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" name="username" id="user" required placeholder="User name" class="form-control">   </div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" name="password" id="password" required placeholder="Password" class="form-control">
</div>


<div class="input-group">
<div class="checkbox">
<label>
<input id="login-remember" type="checkbox" name="remember" value="1"> Biarkan Login
</label>
</div>
</div>

<div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

<div class="col-sm-12  controls" align="center">
<input type="submit" name="logins"  value="Login" class="btn btn-lg btn-primary btn-outline btn-block"  > </a>
</div>



  </form>



                        </div>
                    </div>
        </div>





         </div>
    </div>


    <script type="text/javascript">document.getElementById('user').focus();</script>
