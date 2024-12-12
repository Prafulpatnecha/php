<?php 

    header("Assess-Control-Allow-Method:PUT");
    header("Contant-Type: applicaion/json");

    include("config.php");
    $c1 = new Config();

    if($_SERVER["REQUEST_METHOD"]=="PUT")
    {
        $data = file_get_contents("php://input");
        parse_str($data,$result);
        $id = $result['id'];
        $name = $result['name'];
        $age = $result['age'];
        $course = $result['course'];
        
        $res = $c1->updateData($id,$name,$age,$course);

        if($res)
        {
            $arr['massage'] = "Data Updated Successfully";
        }else{
            $arr['massage'] = "Data Not Updated";
        }
    }
    else{
        $arr["error"] = "only PUT type is allowed";
    }
    
    echo json_encode($arr);
?>