<?php

require_once "../config/connect.php";



if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if (!empty($name) && !empty($email) && !empty($phone)) {
        // fetch all records from table workers to check if this user already in database  
        $stmt = $con->prepare("SELECT * FROM workers WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() >= 1) {
            echo  "<div class='alert alert-danger alert-dismissible fade show w-50 mb-5 position-absolute bottom-0 end-0' role='alert'>
        <button
            type='button'
            class='btn-close'
            data-bs-dismiss='alert'
            aria-label='Close'
        ></button>a
        <strong>erreur!</strong> User Already exists!!
        </div>";
        } else {
            $stmt = $con->prepare("INSERT INTO workers VALUES (NULL, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone]);
            header("Location: index.php");
        }
    } else {
        echo  "<div class='alert alert-danger alert-dismissible fade show w-50 mb-5 position-absolute bottom-0 end-0' role='alert'>
        <button
            type='button'
            class='btn-close'
            data-bs-dismiss='alert'
            aria-label='Close'
        ></button>
    
        <strong>erreur!</strong> Tous les champs sont obligatoires
    </div>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Add user</title>
</head>

<body>
    <div class="container d-flex pt-5 justify-content-between vh-100">
        <div class="card  w-50 m-auto ml-5 mt-5">
            <div class="card-header bg-primary">
                <h2 class="text-white fw-bold ms-4">Add user</h2>
            </div>
            <form method="post">
                <div class="card-body">
                    <input type="text" name="name" placeholder="Name" class="form-control my-3">
                    <input type="text" name="email" placeholder="Email" class="form-control my-3">
                    <input type="text" name="phone" placeholder="Phone" class="form-control ">
                </div>
                <div class="card-footer">
                    <button class="btn bg-primary w-100 text-white fw-bold" name="add">Save</button>
                </div>
            </form>
        </div>
        <a href="index.php" class="text-primary h1 mt-3 pe-5"><i class='bx bx-subdirectory-left'></i></a>
    </div>




    <script src="../assets/js/bootstrap.bundle - Copy.js"></script>
</body>

</html>