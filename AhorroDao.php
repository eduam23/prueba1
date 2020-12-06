<?php
require_once './ConexionBD.php';
 class AhorroDao {
 
 function Adicion($nom, $saldo){
 $cn=new ConexionBD();
 $sql="call spadicion('$nom',$saldo)";
 $res=  mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
//$res=  mysqli_query($cn,$sql) or die(mysqli_error($cn));
 return $res;
 }
 public function Listado(){
    $cn=new ConexionBD();
 $sql="select * from ahorro"; 
 $res=  mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
 $persona["ahorro"]=array();
// $vec=array();
 while($fila=  mysqli_fetch_array($res)){
    array_push($persona["ahorro"],array("cuenta"=> $fila[0],"nombre"=>$fila[1],
        "saldo"=>$fila[2]));
  
  }
 
  return $persona;   
 }
 public function consulta($nro){
    $cn=new ConexionBD();
 $sql="select nrocta, nombre , saldo from ahorro where nrocta=$nro"; 
 $res=  mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
 
 //$num=  mysqli_num_rows($res);
 $persona["dato"]=array();
//if($num>0){
     $fila= mysqli_fetch_assoc($res);
     array_push($persona["dato"],array("cuenta"=> $fila['nrocta'],"nombre"=>$fila['nombre'],
         "saldo"=>$fila['saldo']));
     
 //} 
 return $persona; 
   
 }
 
 function Adimovi($nro,$tp, $monto){
 $cn=new ConexionBD();
 $sql="call spmovin('$nro','$tp',$monto)";
 $res=  mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
//$res=  mysqli_query($cn,$sql) or die(mysqli_error($cn));
 return $res;
 }
 
 public function LisMovin($nro){
    $cn=new ConexionBD();
 $sql="select * from movimiento where nrocta='$nro'"; 
 $res=  mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
 $persona["ahorro"]=array();
// $vec=array();
 while($fila= mysqli_fetch_array($res)){
    array_push($persona["ahorro"],array("cuenta"=> $fila[0],"nro"=>$fila[1],
        "tipo"=>$fila[2],"monto"=>$fila[3],"fecha"=>$fila[4]));
  
  }
 
  return $persona;   
 }
}

?>
