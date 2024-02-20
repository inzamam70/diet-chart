<div class="service">
    <div class="service-heading">
        <h1>Our Service</h1>
        <p></p>
    </div>
    <div class="card-section">
        <?php
        include_once "conn.php";
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        $id = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card" >
                <div class="cardimg" >
                    <img src="<?= $row['image'] ?>" alt="">
                </div>
                <div class="card-content">
                    <h3><?= $row['name'] ?></h3>
                    <p class="description"><?= $row['description'] ?></p>
                    <a href="product-item.php?category_id=<?= $row['id'] ?>" class="card-btn">Show Products</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>