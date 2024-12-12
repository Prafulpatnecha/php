<?php

header("Assess-Control-Allow-Method:GET");
header("Contant-Type: application/json");

include("config.php");
    $c1 = new Config();

    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        $res = $c1->getRecord();
        $student = [];
        if($res)
        {
            while($data = mysqli_fetch_assoc($res))
            {
                array_push($student,$data);
            }
            $arr['data'] = $student;
        }else{
            $arr['error'] = "Data Not Found";
        }
    }
    else{
        $arr['error'] = "only GET type is allowed";
    }

    echo json_encode($arr);
?>