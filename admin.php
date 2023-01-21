<?php 
@include 'config.php';

/* Product markad sogalineysid waye */
/* Qebtan waxay qabilsantahay wax sogaliska */

if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES
    ('$p_name', '$p_price', '$p_image')") or die('query failed');
    if($insert_query){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[]= ' shay ayaa kusodartay';
    }else {
        $message[]= 'Product wax kuma darin ! ';
    }
}

/* Qebtan waxay qabilsantahay wax Delete garenta */

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_query =  mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or die("Qoralka kaqaldan");
    if($delete_query){
        $message[]= 'Product waa latir tiray ! ';
    }else{
        $message[]= 'Product wali malatir tirin ! ';
    };
};

/* Qebtan waxay qabilsantahay wax update garenta */

if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/'.$update_p_image;

    $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name' ,
     price = '$update_p_price' , image = '$update_p_image' WHERE id = '$update_p_id' ");

     if($update_query){
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[]= 'product wala update gareyey';
        header('location:admin.php');
     }else{
        $message[]= 'product mala update garenin';
        header('location:admin.php');
     }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 

/* kan adi kuma quseyo waa menu bar ama menu icon waye */

if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.
        parentElement.style.display=`none`;"></i> </div>';
    };
};

?>
<!-- Qebtan waa qebta kore ee header ka yacni waa mesha ku qoran tahay Kusodar alaab iyo fiiri alaab-->

<?php include 'header.php'; ?>
    <div class="container">
        <section>
            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>Kusoo dar alaab cusub </h3>
                <input type="text" name="p_name" placeholder="Gali Alabta magaceda" class="box" required>
                <input type="number" name="p_price" min="0" placeholder="Gali Alabta Qimaheda" class="box" required>
                <!-- qebtan hose waa noca sawirka lobahan yahay png , jpg , png  qebta ka hoseso waa button  -->
                <input type="file" name="p_image" accept="image/jpg, image/jpeg, image/jpeg" class="box">
                <input type="submit" name="add_product" value="Taabo Halkan" class="btn">
            </form>
        </section>
 <!-- qebtan waa table lada wixii ad kaso galisay qebta kore oo hos ku imanayan waye  -->
        <section class="display-product-table">
            
            <table>

                <thead>
                    <th>Alabta Sawirkeda</th>
                    <th>Alabta magaceda</th>
                    <th>Alabta Qimaheda</th>
                    <th>Halkan kabadal</th>
                </thead>

                <tbody>
                    <!-- Add product table kiisa waye  -->

                    <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products`");
                    if(mysqli_num_rows($select_product) > 0){
                        while($row = mysqli_fetch_assoc($select_product)){

            
                    
                    ?>
                    <!-- update iyo delete ayey iskugu jiran -->
                    <tr>
                        <td><img src="uploaded_img/<?php echo $row['image'];?>" height="100" alt=""> </td>
                        <td> <?php echo $row['name']?></td>
                        <td>$ <?php echo $row['price']?></td>
                        <td> 
                            <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
                            onclick="return confirm('Mahubta inad Delete gareysid');"><i 
                            class="fas fa-trash"></i> Delete</a>
                            <a href="admin.php?edit=<?php echo $row['id']; ?>" 
                            class="option-btn"><i class="fas fa-edit"></i>Update</a>
                        </td>
                    </tr>

                    <?php 
                      };
                    }else{
                        echo "<div class='empty'> Waxba laguma so darin </div>";
                    };
                    
                    ?>
                </tbody>
            </table>
        </section>

        <section class="edit-form-container">

        <!-- Qebta Edit ama update ka waye  -->
            <?php 

            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
                if(mysqli_num_rows($edit_query) > 0){
                    while($fetch_edit = mysqli_fetch_assoc($edit_query)){

            
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <img src="uploaded_img/<?php echo $fetch_edit ['image']; ?>" height="200" alt="">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit ['id']; ?>">
                <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit ['name']; ?>">
                <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit ['price']; ?>">
                <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                <input type="submit" value="update product" name="update_product" class="btn">
                <input type="reset" value="cancel" id="close-edit" class="option-btn">
            </form>
            
            <?php 
            };
        };
        echo "<script>document.querySelector('.edit-form-container').style.display = 'flex'; </script>";
    };
        
        
            
            ?>
        </section>

    </div>










    

<script src="/index.js"></script>
</body>
</html>