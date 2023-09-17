<!-- List all products -->
<br>
<h2 class="text-center">Support Your Favorite Video Bloger</h2>
<br>
<?php if(!empty($products)){ foreach($products as $row){ ?>
    <div class="container">
    <div class="text-center">
    <div class="card">   
        <width= "20%"> <img src="<?php echo base_url('assets/images/'.$row['image']); ?>" />
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <p class="card-text">Support your favorite video bloger.</p>
            <h6>$<?php echo $row['price'].' '.$row['currency']; ?></h6>
            <a href="<?php echo base_url('products/buy/'.$row['id']); ?>" class="btn">
            <img src="<?php echo base_url('assets/images/paypal_btn.png'); ?>" /></a>
        </div>
    </div>
    </div>
    </div>
<?php } }else{ ?>
    <p>Product(s) not found...</p>
<?php } ?>
