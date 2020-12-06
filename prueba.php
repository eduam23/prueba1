<?php
require_once './AhorroDao.php';
$cn=new AhorroDao();
//$vec=$cn->Listado();
$vec=$cn->LisMovin("00001");
print_r($vec);


?>
