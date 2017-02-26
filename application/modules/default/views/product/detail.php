<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=950196511694454";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<section>
    <div class="breadcrumb">
        <div class="fix">
            <ul>
                <li>
                    <a href="">
                        <img src="public/default/img/icon/home.png" alt=" " />
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="categories">
                        <span>Categories</span>
                    </a>
                </li>
                <?php if(isset($category)) { ?>
                <li>
                    <a href="categories/<?php echo $category['link'] ?>">
                        <span><?php echo $category['name'] ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isset($product)) { ?>
                <li>
                    <a href="products/<?php echo $product['link'] ?>">
                        <span><?php echo $product['name'] ?></span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="content-page">
        <div class="fix">
            <div class="title-page">
                <span><?php echo $product['name'] ?></span>
            </div>
            <div class="clr20"></div>
            <div class="page-category">
                <?php $attribute = $this->mattribute->getByProduct($product['id']); $images = json_decode($attribute[0]['images'], true); ?>
                <div class="product-detail f-l">
                    <div class="box-product">
                        <div class="image-box f-l">
                            <img src="public/product/<?php echo $product['id'] ?>/<?php echo $attribute[0]['id'] ?>/thumbnail/<?php echo $images[0] ?>" alt=" " />
                        </div>
                        <div class="info-box f-r">
                            <div class="name">
                                <span><?php echo $product['name'] ?></span>
                            </div>
                            <div class="clr"></div>
                            <div class="price">
                                <small>Price: </small><span><?php echo $product['price'].' $'; ?></span>
                            </div>
                            <div class="clr"></div>
                            <div class="list-info">
                                <div class="item-info">
                                    <div class="title-item-info">
                                        <span>Categories</span>
                                    </div>
                                    <div class="content-item-info">
                                        <span><?php echo $category['name'] ?></span>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="item-info">
                                    <div class="title-item-info">
                                        <span>Code</span>
                                    </div>
                                    <div class="content-item-info">
                                        <span><?php echo $product['code'] ?></span>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <?php $listMaterial = $this->mattribute->getListMaterial($product['id']); if(count($listMaterial) > 0){ ?>
                                <div class="item-info">
                                    <div class="title-item-info">
                                        <span>Size</span>
                                    </div>
                                    <div class="content-item-info">
                                        <select id="size">
                                            <?php
                                                $attributeFirst = json_decode($listMaterial[0]['material'], true);
                                                $materialFirst = $attributeFirst[0];
                                                echo $materialFirst;
                                                $listSize = $this->mattribute->getListSize($product['id'],$materialFirst);
                                                foreach($listSize as $size){
                                                $imagesSize = json_decode($size['images'], true);
                                            ?>
                                            <option data-image="<?php echo $imagesSize[0] ?>" value="<?php echo $size['id'] ?>"><?php echo $size['size'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="drop"></div>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="item-info">
                                    <div class="title-item-info">
                                        <span>Material</span>
                                    </div>
                                    <div class="content-item-info">
                                        <select id="material">
                                            <?php foreach($listMaterial as $material){ ?>
                                            <option value="<?php $nameMaterial = json_decode($material['material'], true); echo $nameMaterial[0]; ?>"><?php echo $nameMaterial[0] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="drop"></div>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <?php } ?>
                                <div class="item-info">
                                    <div class="title-item-info">
                                        <span>Quantity</span>
                                    </div>
                                    <div class="content-item-info">
                                        <button class="up"><img src="public/default/img/icon/up.png" alt=" " /></button>
                                        <input type="text" id="quantity" readonly="" value="1" />
                                        <button class="down"><img src="public/default/img/icon/down.png" alt=" " /></button>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <div class="follow">
                                <span>Follow: </span>
                                <div class="social">
                                    <a href="<?php echo $this->mconfig->getByKey('link_fb') ?>">
                                        <img src="public/default/img/icon/fb.png" alt=" " />
                                    </a>
                                    <a href="<?php echo $this->mconfig->getByKey('link_tw') ?>">
                                        <img src="public/default/img/icon/tw.png" alt=" " />
                                    </a>
                                    <a href="<?php echo $this->mconfig->getByKey('link_pr') ?>">
                                        <img src="public/default/img/icon/pr.png" alt=" " />
                                    </a>
                                    <a href="<?php echo $this->mconfig->getByKey('link_in') ?>">
                                        <img src="public/default/img/icon/in.png" alt=" " />
                                    </a>
                                    <a href="<?php echo $this->mconfig->getByKey('link_gg') ?>">
                                        <img src="public/default/img/icon/gg.png" alt=" " />
                                    </a>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <div class="button-detail">
                                <button id="addWish">Add to wish list</button>
                                <button id="addCart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="clr20"></div>
                    <div class="more-info">
                        <div class="menu-more-info">
                            <ul>
                                <li class="active" data-class="description">
                                    <span>Product Description</span>
                                </li>
                                <li data-class="review">
                                    <span>Review</span>
                                </li>
                            </ul>
                        </div>
                        <div class="clr"></div>
                        <div class="content-more-info">
                            <div class="description item-info ckeditor scroll"><?php echo $product['content'] !='' ? $product['content'] : "Data is updating..." ?></div>
                            <div class="review item-info">
                                <div class="fb-comments" data-width="725px" data-href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-numposts="3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-category f-r">
                    <div class="title-menu-category">
                        <span>Categories</span>
                    </div>
                    <div class="clr"></div>
                    <ul>
                        <?php $categories = $this->mcategory->listall(); foreach($categories as $cate){ ?>
                        <li <?php if(isset($category) && $category['id']==$cate['id']) echo 'class="active"'; ?>>
                            <a href="categories/<?php echo $cate['link'] ?>">
                                <span><?php echo $cate['name'] ?></span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="list-product list-product-bestSell">
        <div class="cover-list-product"></div>
        <div class="fix">
            <div class="title-list-product">
                <span>Other Products</span>
                <br />
                <img src="public/default/img/icon/decorator.png" alt=" " />
            </div>
            <div class="button-list-product">
                <div class="button-prev f-l button-prev-bestSell">
                    <img src="public/default/img/icon/pre.png" alt=" " />
                </div>
                <div class="button-next f-r button-next-bestSell">
                    <img src="public/default/img/icon/next.png" alt=" " />
                </div>
            </div>
            <div class="clr20"></div>
            <div class="products">
                <ul>
                <?php $products = $this->mproduct->getNew(); foreach($products as $p){
                    $attribute = $this->mattribute->getOneByProduct($p['id']);
                    $images = json_decode($attribute['images'], true);
                ?>
                    <li>
                        <a href="products/<?php echo $p['link'] ?>">
                            <div class="img-product">
                                <img src="public/product/<?php echo $p['id'] ?>/<?php echo $attribute['id'] ?>/thumbnail/<?php echo $images[$attribute['avatar']]; ?>" alt=" " />
                            </div>
                            <div class="name-product">
                                <span><?php echo $p['name'] ?></span>
                            </div>
                            <div class="price-product">
                                <span><?php echo $p['price'] ?>$</span>
                            </div>
                            <div class="detail-product">
                                <span>Detail</span>
                            </div>
                            <div class="cover-product"></div>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php $products = $this->mproduct->getByCategory($product['category'],12,0); if(count($products)>0){ ?>
    <div class="clr30"></div>
    <div class="list-product list-product-featured">
        <div class="cover-list-product"></div>
        <div class="fix">
            <div class="title-list-product">
                <span>Same Category Products</span>
                <br />
                <img src="public/default/img/icon/decorator.png" alt=" " />
            </div>
            <div class="button-list-product">
                <div class="button-prev f-l button-prev-bestSell">
                    <img src="public/default/img/icon/pre.png" alt=" " />
                </div>
                <div class="button-next f-r button-next-bestSell">
                    <img src="public/default/img/icon/next.png" alt=" " />
                </div>
            </div>
            <div class="clr20"></div>
            <div class="products">
                <ul>
                <?php foreach($products as $p){
                    $attribute = $this->mattribute->getOneByProduct($p['id']);
                    $images = json_decode($attribute['images'], true);
                ?>
                    <li>
                        <a href="products/<?php echo $p['link'] ?>">
                            <div class="img-product">
                                <img src="public/product/<?php echo $p['id'] ?>/<?php echo $attribute['id'] ?>/thumbnail/<?php echo $images[$attribute['avatar']]; ?>" alt=" " />
                            </div>
                            <div class="name-product">
                                <span><?php echo $p['name'] ?></span>
                            </div>
                            <div class="price-product">
                                <span><?php echo $p['price'] ?>$</span>
                            </div>
                            <div class="detail-product">
                                <span>Detail</span>
                            </div>
                            <div class="cover-product"></div>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="clr20"></div>
</section>
<form id="formCart" method="post">
    <input type="hidden" name="attribute" id="attribute" value="<?php echo $listSize[0]['id'] ?>" />
    <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>" />
    <input type="hidden" name="quantity" id="quantity" value="1" />
</form>
<script>
    $(document).ready(function(){
        $('.menu-more-info ul li').click(function(){
            $('.menu-more-info ul li').removeClass('active');
            $(this).addClass('active');
            var item = $(this).data('class');
            if(item == 'review') {
                $('.description').fadeOut('1000', function(){
                    $('.'+item).fadeIn('1000');
                })   
            } else {
                $('.review').fadeOut('1000', function(){
                    $('.'+item).fadeIn('1000');
                })
            }
        })
        $('.up').click(function(){
            var val = parseInt($(this).parent().find('input').val());
            $(this).parent().find('input').val(val+1);
            $('#quantity').val(val+1);
        })
        $('.down').click(function(){
            var val = parseInt($(this).parent().find('input').val());
            if(val-1 != 0){
                $(this).parent().find('input').val(val-1);
                $('#quantity').val(val-1);
            } else {
                $(this).parent().find('input').val(1);
                $('#quantity').val(1);
            }
        })
        $('body').on('change','#size', function(){
            image = $('#size').find(":selected").data('image');
            $('.image-box img').attr('src','public/product/<?php echo $product['id'] ?>/'+$('#size').val()+'/thumbnail/'+image);
            $('#attribute').val($('#size').val());
        })
        $('body').on('change','#material',function(){
            var material = $(this).val();
            var product_id = '<?php echo $product['id'] ?>';
            $.post('default/product/loadSize',{material:material, product_id:product_id}, function(data){
                $('#size').html(data);
                $('#size').trigger('change');
            })
        })
        $('body').on('click','#addWish',function(){
            var product_id = '<?php echo $product['id'] ?>';
            $.post('default/love/add',{product_id:product_id},function(data){
                alertify.alert(data);
                updateCountWishList();
            })
        })
        $('body').on('click','#addCart', function() {
            var size = $('#size').val();
            var quantity = $('#quantity').val();
            var product_id = '<?php echo $product['id'] ?>';
            $.post('default/cart/addCart',{size:size, quantity:quantity, product_id:product_id}, function(data){
                alertify.alert(data);
                updateCountCart();
            })
        })
        function updateCountWishList(){
            $.post('default/love/count',{},function(data){
               $('.number-wish').html(data);  
            })
        }
        function updateCountCart(){
            $.post('default/cart/count',{},function(data){
               $('.number-cart').html(data);  
            })
        }
    })
</script>