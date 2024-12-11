<?php 
    session_start();
    include("config.php");
    $c1 = new Config();
    
    $idSet = $_SESSION['id'];
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $course = $_SESSION['course'];

    $valid=false;
    if(isset($_REQUEST["update-button"]))
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];
        $c1->updateData($idSet,$name,$age,$course) ;

    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPdate Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

    <form method="POST">
        <div class="form-container">
            <h1>Update Form</h1>
            <form method="POST">
                <input type="text" name="name" placeholder="Enter Your Name" class="input-field" value="<?php echo $name?>" required>
                <input type="number" name="age" placeholder="Enter Your Age" class="input-field" value="<?php echo $age?>" required>
                <input type="text" name="course" placeholder="Enter Your Course" class="input-field" value="<?php echo $course?>" required>
            </form>
                <button type="button" onclick="history.back()" name="close" class="btn btn-secondary">Close</button>
                <button type="submit" class="btn btn-primary" name="update-button" >Submit</button>
            </div>
            <!-- <button type="submit" name="submit" class="submit-btn">Submit</button> -->
    </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>