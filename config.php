
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

        private function connect()
        {
            $this->connection=mysqli_connect($this->host,$this->username,$this->password,$this->datatype);
            // if($this->connection)
            // {
            //     echo "DataBase connected successfully";
            // }
            // else{
            //     echo "DataBase Can Not Connected";
            // }
        }
        
        public function __construct()
        {
            $this->connect();
        }

        
    }
?>