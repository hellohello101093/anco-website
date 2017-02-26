<?php foreach($data as $product) { 
    $attribute = $this->mattribute->getOneByProduct($product['id']);
    $images = json_decode($attribute['images'], true);    
?>
<li>
    <a href="products/<?php echo $product['link'] ?>">
        <div class="img-product">
            <img src="public/product/<?php echo $product['id'] ?>/<?php echo $attribute['id'] ?>/thumbnail/<?php echo $images[$attribute['avatar']]; ?>" alt=" " />
        </div>
        <div class="name-product">
            <span><?php echo $product['name'] ?></span>
        </div>
        <div class="price-product">
            <span><?php echo $product['price'] ?>$</span>
        </div>
        <div class="detail-product">
            <span>Detail</span>
        </div>
        <div class="cover-product"></div>
    </a>
</li>
<?php } ?>
<?php if(!$showMore){ ?>
<script>
    $(document).ready(function(){
        $('.show-more').hide();
    })
</script>
<?php } ?>