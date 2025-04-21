<?php

require_once "../config/connect.php";

$stmt = $con->prepare("SELECT * FROM workers");
$stmt->execute();
$workers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Crud </title>
</head>

<body>
    <div class="container ">
        <section class="d-flex justify-content-between mt-5">
            <h2>All Users</h2>
            <a href="add.php" class="text-primary h1"><i class='bx bx-user-plus'></i></a>
        </section>
        <hr>

        <div
            class="table-responsive">
            <table
                class="table table-striped table-hover table-borderless  align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($workers as $worker): ?>
                    <tr>
                        <td><?= $worker['worker_id'] ?></td>
                        <td><?= $worker['name'] ?></td>
                        <td><?= $worker['email'] ?></td>
                        <td><?= $worker['phone'] ?></td>
                        <td>
                            <a href="delete.php?id=<?= $worker['worker_id'] ?>" class="h3 text-danger me-3"><i class='bx bx-trash'></i></a>
                            <a href="update.php?id=<?= $worker['worker_id'] ?>" class="h3 text-success"><i class='bx bx-edit' ></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="../assets/js/bootstrap.bundle - Copy.js"></script>
</body>

</html>