<?php
if ($_SESSION['level'] == 'Pengajar'){
  include 'pengajar.php';
  
}
elseif ($_SESSION['level'] == 'Murid') {
  include 'murid.php';
} 

?>
