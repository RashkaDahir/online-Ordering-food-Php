<?php 

@include 'config.php';

if(isset($_POST['order_btn'])){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $wadanka = $_POST['wadanka'];
    $dhinaca = $_POST['dhinaca'];
    $pin_code = $_POST['pin_code'];
    /* $total_product = $_POST['total_product'];
    $total_price = $_POST['total_price']; */

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .' )';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;
        };
    };
    $total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `orderr`(name, number, email, method, wadanka, dhinaca,
     pin_code, total_product, total_price) 
    VALUES('$name', '$number', '$email', '$method', '$wadanka', '$dhinaca', '$pin_code',
     '$total_product', '$price_total')") or die ('query failed');

    if($cart_query && $detail_query){
        echo "

        <div class='order-mesage-container'>
    <div class='mesage-container'>
    <img src='./delivery.png' >
        <h3>🥳 Wad kumahad santahay sad u adegatay 🥳</h3>
        <div class='order-detail'>
        <span> ".$total_product." </span>
            <span class='total'>total : $ ".$price_total." </span>
        </div>
        <div class='customer-detail'>
            <p>Magacaga : <span>".$name."</span></p>
            <p>numberkaga : <span>".$number."</span></p>
            <p>E-mailkaga : <span>".$email."</span></p>
            <p>method : <span>".$method.", ".$wadanka.", ".$dhinaca." - ".$pin_code."</span></p>
            <p> Noca waxgadashada : <span>".$method."</span></p>
            <img src='./delivery.png' >
            <p>👋 Dalabkaga waxan kugu adegi dona sida ugu dhaqsiyaha badan : <span></span></p>
        </div>
        <a href='product.php' class='btn'>Continue shopping</a>
    </div>
</div>
        
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
    

<?php include 'header.php'; ?>

<div class="container">
    
    <section class="checkout-form">
    <h1 class="heading" >Dalabkaga waa dhamestiran yhay</h1>

        <form action="" method="post">

        <div class="display-order">
        <?php 
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
        $total = 0;
        $grand_total = 0;
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total = $total += $total_price;
        
        ?>
        <span><?= $fetch_cart['name']; ?>( <?= $fetch_cart['quantity']; ?> )</span>
        <?php 
        };
      }else{
        echo "<div class='display-order'><span> Adeegaga waxbo kumajiro </span></div>";
      }
        
        ?>
        <span class="grand-total">Wadarta guud : $ <?= $grand_total; ?> </span>

    </div>

            <div class="flex">
                <div class="inputbox">
                    <span>Magacaga</span>
                    <input type="text" name="name" placeholder="Magacaga " required>
                </div>
                <div class="inputbox">
                    <span>Telephone kaga</span>
                    <input type="number" name="number" placeholder="numberkaga " required>
                </div>
                <div class="inputbox">
                    <span>E-mail kaga</span>
                    <input type="email" name="email" placeholder="E-mailka" required>
                </div>
                <div class="inputbox">
                    <span>Noca wax gadashada</span>
                    <select name="method" >
                        <option value="cash on delivery">Evc-plus</option>
                        <option value="Credit Card">Goolis</option>
                        <option value="Paypal">E-dahab</option>
                    </select>
                    <div class="inputbox">
                    <span>Wadnkad jogtid</span>
                    <input type="text" name="wadanka" placeholder="Wadankad" required>
                </div>
                <div class="inputbox">
                    <span>Halkad kajogtid</span>
                    <input type="text" name="dhinaca" placeholder="Halkad" required>
                </div>
                <div class="inputbox">
                    <span>Pin Code</span>
                    <input type="text" name="pin_code" placeholder="pin_code" required>
                </div>
                </div>
                <input type="submit" name="order_btn" value="order now" class="btn">
            </div>
        </form>
    </section>
</div>


<script src="/index.js"></script>
    
</body>
</html>