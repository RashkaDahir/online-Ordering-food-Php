<header class="header">
    <div class="flex">
        <a href="#" class="logo">ZOOBE BURGER</a>
        <nav class="navbar">
            <a href="admin.php" >Kusoo Dar Alaab</a>
            <a href="history.php" style='color:red'>Dadka so Dalbaday</a>
            <a href="product.php">Fiiri Alabta</a>
            
        </nav>

        <?php

        $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);

        ?>

        <a href="cart.php"  class="cart">Cart <span><?php echo $row_count; ?></span></a>
        <div id="menu-btn" class="fas fa-bars"></div>
    </div>
</header>