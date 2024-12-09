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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-image: linear-gradient(to right, rgba(255, 0, 0, 0.1), rgba(255, 0, 0, 1));
        font-family: 'Arial', sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    .form-container {
        width: 100%;
        max-width: 380px;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        text-align: center;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .form-container h1 {
        margin-bottom: 20px;
        color: #333;
        font-size: 28px;
    }

    .input-field {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 5px;
        border: 2px solid #ddd;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .input-field:focus {
        border-color: #f44336;
        outline: none;
    }

    .submit-btn {
        background-color: #f44336;
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
        background-color: #d32f2f;
    }

    .progress-bar {
        width: 100%;
        height: 8px;
        background-color: #ddd;
        border-radius: 5px;
        margin-top: 20px;
    }

    .progress {
        height: 100%;
        width: 50%;
        background-color: #f44336;
        border-radius: 5px;
        transition: width 0.3s ease;
    }

    @media screen and (max-width: 600px) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <table>
        <tr>
            <th scope="col">
                <div class="form-container">
                    <h1>Student Registration</h1>
                    <form method="POST">
                        <input type="text" name="name" placeholder="Enter Your Name" class="input-field" required>
                        <input type="number" name="age" placeholder="Enter Your Age" class="input-field" required>
                        <input type="text" name="course" placeholder="Enter Your Course" class="input-field" required>
                        <br><br>
                        <button type="submit" name="submit" class="submit-btn" href="form_confirm.html">
                            Submit
                        </button>
                        <br>
                    </form>

                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>
                </div>
            </th>
            <th scope="col">
                <div style="padding: 100px;">
                </div>
            </th>
            <th scope="col">
                <div class="mx-auto p-2" style="width: 500px;">

                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th scope="col" style="font-weight: bolder;border-top-left-radius: 25px">Id</th>
                                <th scope="col" style="font-weight: bolder;">Name</th>
                                <th scope="col" style="font-weight: bolder;">Age</th>
                                <th scope="col" style="font-weight: bolder;">Course</th>
                                <th scope="col" style="font-weight: bolder;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($data = mysqli_fetch_assoc($res)){ ?>
                            <tr>
                                
                                <th scope="row" style="font-weight: 500;background-color: transparent;border-color: rgba(0, 0, 255, 0.244);"><?php echo $data["id"]?></th>
                                <td style="font-weight: 500;background-color: transparent;border-color: rgba(0, 0, 255, 0.244);"><?php echo $data["name"]?></td>
                                <td style="font-weight: 500;background-color: transparent;border-color: rgba(0, 0, 255, 0.244);"><?php echo $data["age"]?></td>
                                <td style="font-weight: 500;background-color: transparent;border-color: rgba(0, 0, 255, 0.244);"><?php echo $data["course"]?></td>
                                <td>
                                    <form method="POST">
                                        <input value="<?php echo $data["id"] ?>" name="deleteId" type="hidden">
                                    <button type="button" class="btn btn-warning" name="update">Update</button>
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                </form>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </th>
        </tr>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>