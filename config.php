<?php 
    class Config{
        //hostname
        //username
        //password
        //datatype
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $datatype = "demo";
        private $connection;

        public function connect()
        {
            $this->connection=mysqli_connect($this->host,$this->username,$this->password,$this->datatype);
        }
        
        public function __construct()
        {
            $this->connect();
        }

        public function insert($name,$age,$course)
        {
            $query = "INSERT INTO student (id,name,age,course) VALUES(5,$name,$age,$course)";
            
            $res = mysqli_query($this->connection , $query);

            if($res==true)
            {
                echo "DataBase connected successfully!";
            }
            else{
                echo "DataBase Can Not Connected!";
            } 
        }
    }
?>