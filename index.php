<?php
include("function.php");
$db = new cradappphp();


if(isset($_POST['add_info'])){
   $return_msg= $db->add_data($_POST);
}

$data = $db->get_data();

if(isset($_GET['status'])){
   if($_GET['status']="delete"){
   $delete_id=$_GET['id'];
    $db->delete_data($delete_id);
   }
}



   
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
   
<div class="container my-4 p-4 shadow">
    <h2> <a style=" text-decoration:none" href="index.php">Arfin</a> </h2>
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <?php if(isset($return_msg)) {echo $return_msg;} ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image">
        </div>
        <div class=" text-center"><input type="submit" class=" btn btn-success mt-5 value="Add Information" name="add_info"></div>

    </form>
</div>

<div class="container my-4 p-4 shadow">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            <?php foreach($data as $row) : ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><img src="upload/<?php echo $row['image'] ?>" alt="" width="100"></td>
                <td>
                    <a href="edit.php?status=edit&&id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?status=delete&&id=<?= $row['id']; ?>"  class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>