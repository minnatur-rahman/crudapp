<?php
include("function.php");

$objCrudAdmin = new crudApp();

if (isset($_POST['add_info'])) {
    $return_msg = $objCrudAdmin->add_data($_POST);
}
$students = $objCrudAdmin->display_data();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'delete') {
        $delete_id = $_GET['id'];
        $delMsg = $objCrudAdmin->delete_data($delete_id);
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-4 p-4 shadow">
        <form class="form" action="" method="POST" enctype="multipart/form-data">

            <h2><a style="text-decoration: none;" href="index.php">Students Database </a></h2>
            <?php if (isset($delMsg)) {
                echo $delMsg;
            } ?>
            <?php if (isset($return_msg)) {
                echo $return_msg;
            } ?>
            <input class="form-control mb-4" type="text" name="std_name" placeholder="Input Your Name">
            <input class="form-control mb-4" type="number" name="std_roll" placeholder="Input Your Roll">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-4" type="file" name="std_img">
            <input type="submit" value="Add Information" name="add_info" class="form-control bg-warning">
        </form>
    </div>

    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($student = mysqli_fetch_assoc($students)) { ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['std_name']; ?></td>
                        <td><?php echo $student['std_roll']; ?></td>
                        <td><img style="height: 100px;" src="upload/<?php echo $student['stg_img']; ?>"></td>
                        <td>
                            <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['id']; ?>">Edit</a>
                            <a class="btn btn-warning" href="?status=delete&&id=<?php echo $student['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>