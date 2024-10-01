<!DOCTYPE html>


<?php
include 'db.php'; 

$id = $_GET['id'];

$sql = "select * from tasks where id = '$id'";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();

if (isset($_POST['send'])) {

    $task = $_POST['task'];
    $sql2 = "update tasks set first_name = '$task' where id = '$id'";

    $db->query($sql2);

    header ('location: index.php');

}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.css">
    <script src="../bootstrap5/js/bootstrap.js"></script>
    <title>Crud Practice</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="fw-bold text-center">Update List</h1>
            <div class="justify-content-center">
                <div class="d-flex justify-content-end">
                <a href="index.php" class="btn btn-danger mb-2">Go back</a>
                </div>
                <hr><br>


                <form method="POST">
                            <h5 class="modal-title">Update Task Mego</h5>
                            <input type="text" name="task" class="form-control" value="<?php echo $row['first_name']; ?>" required>
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mt-5" name="send">Save changes</button>
                    </div>
                    
            </div>
        </div>
    </div>


    
</body>
</html>