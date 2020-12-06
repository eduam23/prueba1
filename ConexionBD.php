<?php

class ConexionBD {
  private $cn=null;
  function getConecta(){
     if($this->cn==null){
       $this->cn=mysqli_connect("localhost","root","","basebanco");  
          }
      return $this->cn;
  }
  /*
  function __construct() {
      if($this->cn==null){
       $this->cn=@mysqli_connect("localhost","root","","bdbanco");  
          }
      return $this->cn;
  }
   
   */
}

?>
