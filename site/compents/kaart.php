<div class="products">
    <?php
    $sql = "SELECT * FROM products;";
    $products = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($products);
    foreach ($products as $product) : ?>
        <a href="product.php?id=<?php echo $product['id'] ?>" class="product-card">
            <div>
                <h1><?php echo $product['name'] ?></h1>
            </div>
            <div>
                <p><?php echo $product['category'] ?></p>
            </div>
            <div>
                <p>Price:<?php echo $product['price'] ?> </p>
            </div>
            <div>
                <p><?php echo $product['rating'] ?>/5</p>
            </div>
            <div>
                <p>left in stock:<?php echo $product['amount'] ?> </p>
            </div>
            <div>
                <img src="<?php echo $product['image'] ?>">
            </div>

        </a>
    <?php endforeach; ?>
</div>