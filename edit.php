<?php
include("function.php");
$db = new cradappphp();



if(isset($_GET['status'])){
   if($_GET['status']="edit"){
    $id=$_GET['id'];
    $data = $db->edit_data($id);
   }
}

if(isset($_POST['edit_info'])){
    $return_msg= $db->update_data($_POST);
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
            <input type="text" class="form-control" name="E_name" id="name" value="<?php echo $data['name']?>" >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="E_email" id="email" value="<?php echo $data['email']?>"  >
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="E_phone" id="phone"  value="<?php echo $data['phone']?>" >
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="E_image" id="image" placeholder="Enter Image">
        </div>
        <input type="hidden" value="<?php echo $data['id']?>"  name="E_id">

        <div class=" text-center"><input type="submit" class=" btn btn-success mt-5 value="Update Information" name="edit_info"></div>

    </form>
</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>