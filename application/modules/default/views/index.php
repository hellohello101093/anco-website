<section>
    <div class="slider">
        <ul id="page-slider">
            <?php $sliders = $this->mslider->listAll(); foreach($sliders as $slider){ ?>
            <li>
                <a href="#">
                    <img src="public/slider/<?php echo $slider['image'] ?>" alt=" " />
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div class="clr30"></div>
    <div class="list-cate">
        <div class="fix">
            <ul>
                <?php $categories = $this->mcategory->listAll(); foreach($categories as $cat) { ?>
                <li>
                    <a href="categories/<?php echo $cat['link'] ?>">
                        <img src="public/category/<?php echo $cat['image'] ?>" alt=" " />
                        <div class="cover-cate">
                            <span><?php echo $cat['name'] ?></span>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="list-product list-product-featured">
        <div class="cover-list-product"></div>
        <div class="fix">
            <div class="title-list-product">
                <span>Featured Products</span>
                <br />
                <img src="public/default/img/icon/decorator.png" alt=" " />
            </div>
            <div class="button-list-product">
                <div class="button-prev f-l button-prev-featured">
                    <img src="public/default/img/icon/pre.png" alt=" " />
                </div>
                <div class="button-next f-r button-next-featured">
                    <img src="public/default/img/icon/next.png" alt=" " />
                </div>
            </div>
            <div class="clr20"></div>
            <div class="products">
                <ul>
                <?php $products = $this->mproduct->getFeaturedProducts(); foreach($products as $product){
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
            </div>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="list-product list-product-bestSell">
        <div class="cover-list-product"></div>
        <div class="fix">
            <div class="title-list-product">
                <span>Best Sell</span>
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
                <?php $products = $this->mproduct->getBestSellProducts(); foreach($products as $product){
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
            </div>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="banner">
        <div class="fix">
            <ul>
                <li>
                    <img src="public/default/img/icon/banner1.png" alt=" " />
                </li>
                <li>
                    <img src="public/default/img/icon/banner2.png" alt=" " />
                </li>
                <li>
                    <img src="public/default/img/icon/banner3.png" alt=" " />
                </li>
            </ul>
        </div>
    </div>
</section>