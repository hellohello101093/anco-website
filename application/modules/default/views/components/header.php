<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=1024, initial-scale=0, maximum-scale=1, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="keywords" content="<?php echo $keyword ?>" />
<meta name="description" content="<?php echo $description ?>" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:url" content="<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo $actual_link; ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:image" content="<?php echo $image_fb ?>" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="200" />
<base href="<?php echo base_url(); ?>" />
<link rel="stylesheet" href="public/default/css/style.css" media="screen" />
<link href="public/default/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="public/default/css/owl.carousel.css" rel="stylesheet" />
<link href="public/default/css/owl.theme.css" rel="stylesheet" />
<link rel="stylesheet" href="public/default/css/alertify.css" />
<link rel="stylesheet" href="public/default/css/alertify.default.css" />
<link rel="stylesheet" href="public/default/css/jquery.mCustomScrollbar.css" />
<link rel="stylesheet" type="text/css" href="public/default/css/jquery.timepicker.css" />
<link rel="stylesheet" type="text/css" href="public/default/css/bootstrap-datepicker.css" />
<link rel="stylesheet" type="text/css" href="public/default/css/animate.min.css" />
<link rel="stylesheet" type="text/css" href="public/default/css/responsiveslides.css" />
<link href="public/default/css/preloader/effect.css" rel="stylesheet" />

<title><?php echo $title ?></title>

<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script src="public/default/js/jquery.js" type="application/javascript"></script>
<script src="public/default/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="public/default/js/script.js" type="text/javascript"></script>
<script src="public/default/js/owl.carousel.js"></script>
<script src="public/default/js/alertify.min.js"></script>
<script src="public/default/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="public/default/js/jquery.timepicker.js"></script>
<script type="text/javascript" src="public/default/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="public/default/js/responsiveslides.min.js"></script>
<script type="text/javascript" src="public/fancy/jquery.fancybox.js?v=2.1.5"></script>
<script src="public/default/js/preloader/pace.min.js"></script>

<?php if($this->session->flashdata('response')!=''){ ?>
<script>
    $(document).ready(function(){
        alertify.alert('<?php echo $this->session->flashdata('response') ?>');
    })
</script>
<?php $this->session->set_flashdata('response',''); } ?>
<script>
    $(document).ready(function(){
        $("#page-slider").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 3000,
        });
    })
</script>
</head>

<body>
<header>
    <div class="header">
        <div class="fix">
            <div class="hotline f-l">
                <span>HOTLINE: <?php echo $this->mconfig->getByKey('hotline') ?></span>
            </div>
            <div class="item-header f-l relative">
                <a href="wish-list">
                    <img src="public/default/img/icon/save.png" alt=" " />
                    <span>Wish list</span>
                    <div class="number-item number-wish">
                        <?php if(!$this->session->userdata('wishList')) echo '0'; else echo count($this->session->userdata('wishList')); ?>
                    </div>
                </a>
            </div>
            <div class="item-header f-l relative">
                <a href="checkout">
                    <img src="public/default/img/icon/cart.png" alt=" " />
                    <span>Cart</span>
                    <div class="number-item number-cart">
                        <?php echo count($this->cart->contents()) ?>
                    </div>
                </a>
            </div>
            <?php if($this->session->userdata('loggedIn') === true){ ?>
            <div class="item-header f-l account-box">
                <a>
                    <img src="public/default/img/icon/signin.png" alt=" " />
                    <span>Hi, <?php echo $this->session->userdata('name') ?></span>
                </a>
            </div>
            <div class="item-header f-l">
                <a href="sign-out">
                    <span>Sign out</span>
                </a>
            </div>
            <?php } else { ?>
            <div class="item-header f-l">
                <a href="sign-in">
                    <img src="public/default/img/icon/signin.png" alt=" " />
                    <span>Sign In</span>
                </a>
            </div>
            <div class="item-header f-l">
                <a href="create-account">
                    <img src="public/default/img/icon/create.png" alt=" " />
                    <span>Create Account</span>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="menu">
        <div class="fix">
            <nav>
                <ul>
                    <li class="<?php if(isset($activeMenu) && $activeMenu == 'home') echo 'active'; ?>">
                        <a href="">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu == 'about') echo 'active'; ?>">
                        <a href="about">
                            <span>About</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu == 'categories') echo 'active'; ?>">
                        <a href="categories">
                            <span>Categories</span>
                            <img src="public/default/img/icon/row.png" alt=" " />
                        </a>
                        <div class="sub-menu">
                            <div class="list-sub-menu">
                                <?php $categories = $this->mcategory->listAll(); foreach($categories as $cat){ ?>
                                <div class="item-sub-menu">
                                    <a href="categories/<?php echo $cat['link'] ?>">
                                        <img src="public/default/img/icon/row-menu.png" alt=" " />
                                        <span><?php echo $cat['name'] ?></span>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu == 'entertaiment') echo 'active'; ?>">
                        <a>
                            <span>KT Entertaiment</span>
                            <img src="public/default/img/icon/row.png" alt=" " />
                        </a>
                        <div class="sub-menu">
                            <div class="list-sub-menu">
                                <div class="item-sub-menu">
                                    <a href="events">
                                        <img src="public/default/img/icon/row-menu.png" alt=" " />
                                        <span>Event Entertaiment</span>
                                    </a>
                                </div>
                                <div class="item-sub-menu">
                                    <a href="video">
                                        <img src="public/default/img/icon/row-menu.png" alt=" " />
                                        <span>Video Entertaiment</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu == 'news') echo 'active'; ?>">
                        <a href="news">
                            <span>News</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu == 'contact') echo 'active'; ?>">
                        <a href="contact">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="search relative">
                <img src="public/default/img/icon/search.png" alt=" " />
                <form action="categories" method="post">
                    <input type="text" name="key" placeholder="Type some text to search..." />
                </form>
            </div>
        </div>
    </div>
    <div class="logo">
        <a href="">
            <img src="public/default/img/icon/logo.png" alt=" " />
        </a>
    </div>
    <div class="clr"></div>
</header>
<div class="clr"></div>