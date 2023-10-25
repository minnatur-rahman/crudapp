<?php
include("function.php");

$objCrudAdmin = new crudApp();

$students = $objCrudAdmin->display_data();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'edit') {
        $id = $_GET['id'];
        $returnData = $objCrudAdmin->display_data_by_id($id);
    }
}
if (isset($_POST['edit_btn'])) {
    $msg = $objCrudAdmin->update_data($_POST);
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

            <h2><a style="text-decoration: none;" href="index.php">Students Database</a></h2>
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
            <input class="form-control mb-4" type="text" name="u_std_name" value="<?php echo $returnData['std_name']; ?>">
            <input class="form-control mb-4" type="number" name="u_std_roll" value="<?php echo $returnData['std_roll']; ?>">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-4" type="file" name="u_std_img">
            <input type="hidden" name="std_id" value="<?php echo $returnData['id']; ?>">
            <input type="submit" value="Update Information" name="edit_btn" class="form-control bg-warning">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>