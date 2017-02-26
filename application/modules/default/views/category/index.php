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
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="content-page">
        <div class="fix">
            <div class="title-page">
                <span><?php echo isset($category) ? $category['name'] : 'Categories'; ?></span>
            </div>
            <div class="clr20"></div>
            <div class="page-category">
                <div class="product-category f-l">
                    <?php if(isset($data) && count($data) > 0){ ?>
                    <ul>
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
                    </ul>
                    <?php } else { ?>
                    <span>Data is upadting...</span>
                    <?php } ?>
                    <?php if($showMore){ ?>
                    <div class="clr20"></div>
                    <div class="show-more">
                        <button><span>View More</span></button>
                    </div>
                    <div class="clr10"></div>
                    <?php } ?>
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
</section>
<script>
    $(document).ready(function(){
        $('body').on('click','.show-more button', function(){
            var start = $('.product-category ul li').length;
            var key = '<?php echo isset($key) ? $key : "" ?>';
            $.post('default/category/loadMore',{start:start, key:key, <?php if(isset($category)){ ?>category: '<?php echo $category['id'] ?>'<?php } ?>}, function(data){
                $('.product-category ul').append(data);
            })
        })
        $(window).scroll(function(){
            topOffSet = 255;
            topWindow = $(window).scrollTop();
            footerOffset = $('footer').offset().top;
            if(topWindow >= topOffSet){
                $('.menu-category').addClass('fixItem');
                if ((topWindow + window.innerHeight) < footerOffset) {
                    $('.menu-category ul').mCustomScrollbar("destroy");
                    $('.menu-category').removeClass('fixItemHasFooter');
                    $('.menu-category').addClass('fixItemNoFooter');
                } else {
                    $('.menu-category ul').mCustomScrollbar("destroy");
                    $('.menu-category').removeClass('fixItemNoFooter');
                    $('.menu-category').addClass('fixItemHasFooter');
                }
                $('.menu-category ul').mCustomScrollbar();
            } else {
                $('.menu-category').removeClass('fixItem');
                $('.menu-category ul').mCustomScrollbar("destroy");
            }
        })
    })
</script>