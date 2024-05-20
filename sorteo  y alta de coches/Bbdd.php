<?php

class Bbdd
{

  private $host;
  private $user;
  private $pass;
  private $bbdd;
  private $conx;

  public function __construct()
  {
    $this->host = "192.168.33.214";
    $this->user = "sanjose";
    $this->pass = "SQL_2710_jsp";
    $this->bbdd = "i1i31";
    $this->conx = new mysqli();
  }

  public function conecta()
  {
    $this->conx->connect($this->host, $this->user, $this->pass, $this->bbdd);
  }

  public function consulta($sql)
  {
    return $this->conx->query($sql);
  }

  public function insert($sql)
  {
    return $this->conx->prepare($sql);
  }

  public function executa($sql)
  {
    return $this->conx->execute($sql);
  }

  public function inicializaConsulta($rs)
  {
    return mysqli_data_seek($rs, 0);
  }

  public function desconecta()
  {
    $this->conx->close();
  }

}

?>
