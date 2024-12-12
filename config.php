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
            $query = "INSERT INTO student (name,age,course) VALUES('$name','$age','$course')";
            
            $res = mysqli_query($this->connection , $query);


            return $res;
            // if($res==true)
            // {
            //     echo "DataBase connected successfully!";
            // }
            // else{
            //     echo "DataBase Can Not Connected!";
            // }
        }

        public function getRecord()
        {
            $query = "SELECT * FROM student";
            $res = mysqli_query($this->connection,$query);
            // $data = mysqli_fetch_assoc($res);
            return $res;
        }
        public function deleteData($id)
        {
            $query = "DELETE FROM student WHERE id = '$id'";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }

        public function updateData($id,$name,$age,$course)
        {
            $query = "UPDATE student SET name='$name', age='$age' , course='$course' WHERE id='$id'";
            $res = mysqli_query($this->connection,$query);
            return $res;
        }
    }
?>