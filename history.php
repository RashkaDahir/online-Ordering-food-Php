<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DADKA SO DALBADAY</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="/index.js"></script>
    <link rel="stylesheet" href="delivery.css">
</head>
<body>


<div class='container-fluid p-5  '>
<?php

include_once('config.php');

      
    
      $sql=mysqli_query($conn,"SELECT * FROM `orderr`");



?>

<div class=" container  row   mt-5 d-flex  ">
        <div class="col-6">
          <h1 class='btn btn-primary'>DADKA SO DALBADAY  (ORDERS OR DELIVERY PEOPLE)</h1>
        </div>
        <!-- <div class="col-6">BBB</div> -->
      </div>

      <table class="table   table-striped  table-hover table-warning  ">
        <thead class="table-dark">
          <tr>
          
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">NUMBER</th>
            <th scope="col">EMAIL</th>
            <th scope="col">MERHOD</th>
            <th scope="col">WADANKA</th>
            <th scope="col">MAGAALADA</th>
            <th scope="col">PIN_CODE</th>
            <th scope="col">TOTAL PRODUCT</th>
            <th scope="col">TOTAL PRICE</th>
            <th scope="col">STATUS</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
        
        <?php
        include_once('config.php');
        
          while($row=mysqli_fetch_array($sql)){
          ?>
          <tr>
         
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['number'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['method'];?></td>
            <td><?php echo $row['wadanka'];?></td>
            <td><?php echo $row['dhinaca'];?></td>
            <td><?php echo $row['pin_code'];?></td>
            <td><?php echo $row['total_product'];?></td>
            <td><?php echo $row['total_price'];?></td>
            <td>  
                           <?php  
                           if ($row['status']==1) {  
                                echo "WUU HELAY";  
                           }if ($row['status']==2) {  
                                echo "WALI MA HELI";  
                           }if ($row['status']==3) {  
                                echo "WAA LA CANCELAY";  
                           }  
                           ?>  
                      </td>  
                      <td>  
                           <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['id'] ?>')">  
                                <option value="">Update Status</option>  
                                <option value="1">WUU HELAY ADEEG</option>  
                                <option value="2">WALI MAHELIN ADEEG</option>
                                <option value="3">WAA LA CANCELAY ADEEGA</option>  
                                 
                           </select>  
                      </td>  
            
            
          </tr>
            <?php
                }?>

        </tbody>
      </table>

      <?php?>

     
    </div>
    <?php  
 //Database connectivity  
 include_once('config.php');
 $sql=mysqli_query($conn,"select * from orderr");  
 //Get Update id and status  
 if (isset($_GET['id']) && isset($_GET['status'])) {  
      $id=$_GET['id'];  
      $status=$_GET['status'];  
      mysqli_query($conn,"update orderr set status='$status' where id='$id'");  
      // header("location:php3/history.php");  
   
      die();  
 }  
 ?> 






    </div>
 



    <script type="text/javascript">  
      function status_update(value,id){  
           //alert(id);  
           let url = "http://localhost/php3/history.php";  
           window.location.href= url+"?id="+id+"&status="+value;  
      }  
 </script>  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>