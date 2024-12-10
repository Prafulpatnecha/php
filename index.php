<?php 
    
    // include("config.php");
    include("config.php");
    // include("form.html");
    $c1 = new Config();
    $res = $c1->getRecord();
    
    // $c1->connect();
    
    $is_btn_set = isset($_POST["submit"]);
    if($is_btn_set)
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];
        $c1->insert($name,$age,$course);
        $res = $c1->getRecord();
    }
    
    
    if(isset($_POST["delete"]))
    {
        $id = $_POST["deleteId"];
        $c1->deleteData ($id);
        $res = $c1->getRecord();
    }
    $updateId = "";
    $updateName = "";
    $updateAge = "";
    $updateCourse = "";
    
    if(isset($_REQUEST["update-button"]))
    {
        $this->updateId = $_POST["deleteId"];
        $this->updateName = $_POST["nameId"];
        $this->updateAge = $_POST["ageId"];
        $this->updateCourse = $_POST["courseId"];
        echo "Ok";
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
    <title>Bootstrap Example</title>
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

        .table th, .table td {
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
                                    <button type="button" name= "update" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" >Update</button>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
              <form method="POST">
                  <!-- <label for="recipient-name" class="col-form-label"></label> -->
                  <input type="text" name="nameUpdate" placeholder="Enter Your Name"  value="<?php echo $updateName?>" class="input-field" required>
                </form>
                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
            <!-- <input type="text" class="form-control" id="recipient-name"> -->
            <!-- <label for="message-text" class="col-form-label">Message:</label> -->
            <!-- <textarea class="form-control" id="message-text"></textarea> -->
        </div>
        <div class="mb-3">
            <input type="number" name="ageUpdate" placeholder="Enter Your Age" class="input-field" required>
        </div>
        <div class="mb-3">
            <input type="text" name="courseUpdate" placeholder="Enter Your Course" class="input-field" required>
        </div>
        <div class="mb-3">
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name= "update-button">Submit</button>
        <!-- <button type="submit" name="submit" class="submit-btn">Submit</button> -->
    </div>
</div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
