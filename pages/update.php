<?php

require_once "../config/connect.php";

$id = $_GET['id'];
$stmt = $con->prepare("SELECT * FROM workers WHERE worker_id = ?");
$stmt->execute([$id]);
$worker = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $old_photo = $_POST['old_photo'];
    $photo = $_FILES['photo'];
    $img_name = $photo['name'];
    $tmp_name = $photo['tmp_name'];
    $path_img = '../img/'. $img_name;
    move_uploaded_file($tmp_name, $path_img);
    if (file_exists('../img'. $old_photo)){
        unlink('../img'. $old_photo);
    }


    if (!empty($name) && !empty($email) && !empty($phone) && !empty($path_img) ) {
        $stmt = $con->prepare("UPDATE  workers SET name = ?, email  = ?, phone = ?, photo = ?  WHERE worker_id = ?");
        $stmt->execute([$name, $email, $phone, $path_img, $id]);
        header("Location: index.php");
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

            <form method="post" enctype="multipart/form-data">
                <div >
                    <input type="file"  name="photo" hidden id="photo_id" >
                    <label for="photo_id" style="cursor: pointer;" class="d-flex">
                        <img src="<?= $worker['photo'] ?>" alt="<?= $worker['photo'] ?>" name="old_photo" class="rounded-circle" style="height: 200px; width: 40%; margin:0 auto;">
                    </label>
                </div>
                <div class="card-body">
                    <input type="text" value="<?= $worker['name'] ?>" name="name" placeholder="Name" class="form-control my-3">
                    <input type="text" value="<?= $worker['email'] ?>" name="email" placeholder="Email" class="form-control my-3">
                    <input type="text" value="<?= $worker['phone'] ?>" name="phone" placeholder="Phone" class="form-control ">
                </div>
                <div class="card-footer">
                    <button class="btn bg-success w-100 text-white fw-bold" name="update">Update</button>
                </div>
            </form>
        </div>
        <a href="index.php" class="text-primary h1 mt-3 pe-5"><i class='bx bx-subdirectory-left'></i></a>
    </div>




    <script src="../assets/js/bootstrap.bundle - Copy.js"></script>
</body>

</html>