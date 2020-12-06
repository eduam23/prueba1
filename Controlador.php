<?php
require_once './AhorroDao.php';
$tag=$_REQUEST["tag"];
$obj=new AhorroDao();
if($tag=="adicion"){
  $nom=$_REQUEST["txtnom"];  
  $saldo=$_REQUEST["txtsaldo"];
  $res=$obj->Adicion($nom, $saldo);
  if($res==1)
      $men="inserto ok";
  else 
      $men="error";
 
 $response["estado"]=$men;
    
    echo json_encode($response);
}
if($tag=="listado"){
    $lista=$obj->Listado();
    echo json_encode($lista);
 }
if($tag=="consulta"){
      $nro=$_REQUEST["txtnro"];
      $res=$obj->consulta($nro);
      //if($res)
          echo json_encode ($res);
      //else
      //$response["dato"]=array();
      
      //echo json_encode ($response);
     }
  if($tag=="lismov"){
      $nro=$_REQUEST["txtnro"];
      $res=$obj->LisMovin($nro);
      // if($res)
     echo json_encode ($res);
     // else{
      //  $response["dato"]=array();
      //    echo json_encode ($response);
     }
  
   if($tag=="adimov"){
      $nro=$_REQUEST["txtnro"];
      $tp=$_REQUEST["txtipo"];
      $mon=$_REQUEST["txtmon"];
     
      $res=$obj->Adimovi($nro, $tp, $mon);
      if($res)
      $men="inserto ok";
       else 
      $men="error";
 
     $response["estado"]=$men;
       echo json_encode($response);
     
     }

?>
