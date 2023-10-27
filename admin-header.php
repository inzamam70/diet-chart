
<div class="header">


    <div>
        <img src="./css/logo.png" alt="" class="img">
    </div>
  
        <div class="header-item" style="display:flex;gap:10px;justify-content:space-between;">
            
            <h3 >Welcome 
                <?php echo $_SESSION['admin_name']; ?>
            </h3>
        </div>

        <div class="header-item">
            <a href="logout.php"><i class="fa-solid fa-power-off"></i></a>
        </div>

</div>