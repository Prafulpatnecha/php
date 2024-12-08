<?php 
    
    // include("config.php");
    include("config.php");
    include("form.html");
    $c1 = new Config();

    
    // $c1->connect();
    
    $is_btn_set = isset($_POST["submit"]);
    
    if($is_btn_set)
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];
        $c1->insert($name,$age,$course);
    }


?>