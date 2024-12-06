
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
            // if($res)
            // {
            //     echo "DataBase connected successfully";
            // }
            // else{
            //     echo "DataBase Can Not Connected";
            // }
        }
        

        
    }


?>