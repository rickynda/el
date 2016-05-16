<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location: login.php');
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIJARI</title>
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

  </head>






  <body>
  <!-- Navigation Bar -->
<nav class="navbar navbar-default navbar-fixed-top" >
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Online</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

      </ul>
         <ul class="nav navbar-nav navbar-right">
         <li class="active"><a href="#"> <?php echo ucfirst($_SESSION['username']);?></b><br/> <span class="sr-only">(current)</span></a></li>

      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
<br>
<br>

<?php

if($_GET['p']=="11")
    {include 'biodata.php'; }
elseif($_GET['p']=="21")
    {include 'biodata.php'; }
  



else {
  include 'home.php';
}
?>





    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jq.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/datatable.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#example').dataTable();
    } );
  </script>

