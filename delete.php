<?php

    include("config.php");
    header("Access-Control-Allow-Method:DELETE");
    header("Containt-Type: application/json");

    $c1 = new Config();

    if($_SERVER["REQUEST_METHOD"]=="DELETE")
    {
        $data = file_get_contents("php://input");
        parse_str($data,$result);
        $id = $result['id'];
        $res = $c1->deleteData($id);

        if($res)
        {
            $arr["msg"] = "Data Deleted Successfully";
        }else{
            $arr["msg"] = "Data Not Deleted";
        }

    }
    else{
        $arr["error"] = "only DELETE type is allowed";
    }

    echo json_encode($arr);
?>