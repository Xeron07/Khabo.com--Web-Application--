<?php

class DBConn{
	public $servername="localhost";
	public $username="root";
	public $password="";
	public $dbname="khabo";
    public $conn;
    public $result;
    public $val=0;
    public function connect()
		   {

		      $this->conn= new mysqli($this->servername, $this->username, $this->password,$this->dbname);
		      // Check connection
		      if ($this->conn->connect_error) {
		                   die("Connection failed: " . $this->conn->connect_error);
		           }
		           $this->val=1;
		         return $this->val;

		   }

	public function getResult($sql)
    {
        $this->result=$this->conn->query($sql);
        return $this->result;
    }


}



?>