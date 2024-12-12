<?php 

    header("Assess-Control-Allow-Method:PUT");
    header("Contant-Type: applicaion/json");

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
    else if($_SERVER["REQUEST_METHOD"]=="DELETE")
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
    else if($_SERVER['REQUEST_METHOD']=='POST')
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
    }
    else if($_SERVER["REQUEST_METHOD"]=="PUT")
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
    // else{
    //     $arr["error"] = "only PUT type is allowed";
    // }
    
    echo json_encode($arr);
?>