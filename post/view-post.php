<?php
header_remove('Location');
require("../layouts/navbar.php");
require("../config/db.php");

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql = "SELECT * From posts WHERE id = $id ORDER BY created_at DESC ";
    $res = $conn->query($sql);

    if($res->num_rows > 0){

        $data = $res->fetch_assoc();


?>
<h1 class="mt-4"><?= $data['title']?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><?= $data['sub_title']?></li>
    </ol>
    <div class="d-flex">
        <small class="m-2">Post date: <?= $data['created_at']?> </small>
        <small class="m-2">Last Update: <?= $data['updated_at']?></small>
    </div>
    <div>
        <img src="../assets/img/<?= $data['img']?>" width="250" alt="<?= $data['title']?>">
        <p>
        <?= $data['details']?>
        </p>
        <div class="d-flex">
            <a class="btn btn-success m-4 link" role="link" href="update-post.php?id=<?= $data['id']?>">Edit</a>

            <form action="post-data.php" method="post">
              <input type="hidden" name="img" value="<?= $data['img']?>">
              <input type="hidden" name="id" value="<?= $data['id']?>">
              <button class="btn btn-danger m-4" name="delete" onClick="return confirm('Please confirm deletion')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
          </form>

            <!-- <button class="btn btn-danger m-4">Delete</button> -->
        </div>
    </div>

<?php
}
else{
    echo "Data Not Found";
}
}else{
    
    echo "<script> location.replace('all-post.php'); </script>";
}
    require_once("../layouts/footer.php");
    $conn->close();
?>