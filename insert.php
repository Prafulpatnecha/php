<?php

// use PSpell\Config;

    header("Accsess-Control_Allow-Method:POST");
    header("Contant-Type: application/json");

    include("config.php");
    $c1 = new Config();


    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course =$_POST['course'];

        $res = $c1->insert($name,$age,$course);

        if($res)
        {
            $arr['msg'] = "Data Inserted Successfully";
        }
        else{
            $arr['msg'] = "Data Not Inserted";
        }
    }else{
        $arr['error'] = "only POST type is allowed";
    }

    echo json_encode($arr);

?>