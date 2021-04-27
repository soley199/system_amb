<?php 
class Autocompletar
{
 
 private $dbh;
 
 public function __construct()
 {
 $this->dbh = new PDO("mysql:host=127.0.0.1;dbname=system_amb", "root", "");
 }
 
 public function findData($search)
 {
 $query = $this->dbh->prepare("SELECT Cliente, Id_Cliente FROM cliente WHERE Cliente LIKE :search");
        $query->execute(array(':search' => '%'.$search.'%'));
        $this->dbh = null;
        if($query->rowCount() > 0)
        {
        	echo json_encode(array('res' => 'full', 'data' => $query->fetchAll()));
        }
        else
        {
        	echo json_encode(array('res' => 'empty'));
        }
 }
}