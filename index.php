<?php 
    
    // include("config.php");
    include("config.php");
    // include("form.html");
    $c1 = new Config();
    $res = $c1->getRecord();
    
    // $c1->connect();
    $ageCheck = false; 
    $is_btn_set = isset($_POST["submit"]);
    if($is_btn_set)
    { 
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];
        if($age<100 && $age>-1)
        {   
                $c1->insert($name,$age,$course);
                $res = $c1->getRecord();
                $ageCheck=false;
        }else{
            $ageCheck=true;
        }
    }
    
    
    if(isset($_POST["delete"]))
    {
        $id = $_POST["deleteId"];
        $c1->deleteData ($id);
        $res = $c1->getRecord();
    }
    
    session_start();
    if(isset($_POST["update_btn"]))
    {
        $_SESSION["id"] = $_POST["deleteId"];
        $_SESSION["name"] = $_POST["nameId"];
        $_SESSION["age"] = $_POST["ageId"];
        $_SESSION["course"] = $_POST["courseId"];
        header("Location: update_page.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f0f4f8;
        font-family: 'Arial', sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    .container {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        width: 100%;
        max-width: 1200px;
    }

    .form-container {
        width: 100%;
        max-width: 380px;
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .form-container h1 {
        margin-bottom: 25px;
        color: #333;
        font-size: 28px;
        font-weight: bold;
    }

    .input-field {
        width: 100%;
        padding: 12px;
        margin: 12px 0;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .input-field:focus {
        border-color: #0056b3;
        outline: none;
    }

    .submit-btn {
        background-color: #0056b3;
        color: white;
        border: none;
        padding: 12px;
        width: 100%;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #003c82;
    }

    .table-container {
        width: 100%;
        max-width: 900px;
        padding: 30px;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f7f7f7;
        font-weight: bold;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    .action-buttons button {
        padding: 6px 12px;
        margin-right: 5px;
        font-size: 14px;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .btn-warning {
        background-color: #ffc107;
        color: white;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    @media screen and (max-width: 768px) {
        .container {
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            width: 90%;
            padding: 20px;
        }

        .submit-btn {
            font-size: 14px;
        }

        .input-field {
            font-size: 14px;
            padding: 10px;
        }
    }
    </style>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <div class="container">
        <div class="form-container">
            <h1>Student Registration</h1>
            <form method="POST">
                <input type="text" name="name" placeholder="Enter Your Name" class="input-field" required>
                <input type="number" name="age" placeholder="Enter Your Age" class="input-field" required>
                <input type="text" name="course" placeholder="Enter Your Course" class="input-field" required>
                <button type="submit" name="submit" class="submit-btn">Submit</button>
            </form>
        </div>

        <div class="table-container">
            <form method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    while($data = mysqli_fetch_assoc($res)){ ?>
                        <tr>
                            <td><?php echo $data["id"]; ?></td>
                            <td><?php echo $data["name"]; ?></td>
                            <td><?php echo $data["age"]; ?></td>
                            <td><?php echo $data["course"]; ?></td>
                            <td class="action-buttons">
                                <form method="POST">
                                    <input value="<?php echo $data["id"]; ?>" name="deleteId" type="hidden">
                                    <input value="<?php echo $data["name"]; ?>" name="nameId" type="hidden">
                                    <input value="<?php echo $data["age"]; ?>" name="ageId" type="hidden">
                                    <input value="<?php echo $data["course"]; ?>" name="courseId" type="hidden">
                                    <button type="submit" name="update_btn" id="update_btn"
                                        class="btn btn-primary">Update</button>
                                    <!-- <button type="button" class="btn btn-warning" name="update">Update</button> -->
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <?php if($ageCheck==true){?>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    Your age is incorrect. Please enter a valid age between 1 and 100.
    </div>
    <?php }?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>