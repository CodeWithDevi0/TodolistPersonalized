<!DOCTYPE html>


<?php include 'db.php'; 

$page = (isset($_GET['page']) ? (int)$_GET['page' ] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 10);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "select * from tasks limit ".$start." , ".$perPage." ";
$total =$db -> query("select * from tasks") -> num_rows;
$pages = ceil($total / $perPage);

// $sql = "select * from tasks";
$rows = $db->query($sql);



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
            <h1 class="fw-bold text-center">Todo List</h1>
            <div class="justify-content-center">
            <table class="table">
            <div class="d-flex justify-content-between">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">Add task</button>
            <button class="btn btn-secondary" type="button">Print</button>
            </div>
                <hr><br>
                <!-- Modal -->
                <form action="add.php" method="POST">
                <div class="modal" id="exampleModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Task Mego</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" name="task" class="form-control" required>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="send">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>

                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tasks</th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    <?php
                    while ($row = $rows->fetch_assoc()): ?>
                        
                    <th scope="row"><?php echo $row['id']?></th>
                    <td class="col-md-10"><?php echo $row['first_name']?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <center>
                <ul class="pagination">
                    <?php for($i = 1; $i <= $pages; $i++): ?>
                    <li><a href="?page=<?php echo trim((string)$i); ?>&per-page=<?php echo trim((string)$perPage);?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </center>
            

            </div>
            
        </div>
        
    </div>
</body>
</html>