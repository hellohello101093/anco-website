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

<title><?php echo $title ?></title>

<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script src="public/default/js/jquery.js" type="application/javascript"></script>
<script src="public/default/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="public/default/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="public/default/js/jssor.js"></script>
<script type="text/javascript" src="public/default/js/jssor.slider.js"></script>
<script src="public/default/js/owl.carousel.js"></script>
<script src="public/default/js/alertify.min.js"></script>
<script src="public/default/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="public/default/js/jquery.timepicker.js"></script>
<script type="text/javascript" src="public/default/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="public/fancy/jquery.fancybox.js?v=2.1.5"></script>

<?php if($this->session->flashdata('response')!=''){ ?>
<script>
    $(document).ready(function(){
        alertify.alert('<?php echo $this->session->flashdata('response') ?>');
    })
</script>
<?php $this->session->set_flashdata('response',''); } ?>
</head>

<body>
    <div class="fix">
        <div class="menu">
            <div class="logo">
                <a href="">
                    <img src="public/default/img/icon/logo.png" alt=" " />
                </a>
            </div>
            <nav>
                <ul>
                    <li class="<?php if(isset($activeMenu) && $activeMenu === 'gioi-thieu') echo 'active'; ?>">
                        <a href="gioi-thieu">
                            <span>Giới thiệu</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu === 'dich-vu-cung-cap') echo 'active'; ?>">
                        <a href="dich-vu-cung-cap">
                            <span>Dịch vụ cung cấp</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu === 'du-an-khach-hang') echo 'active'; ?>">
                        <a href="du-an-khach-hang">
                            <span>Dự án - Khách hàng</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu === 'tin-tuc') echo 'active'; ?>">
                        <a href="tin-tuc">
                            <span>Tin tức</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($activeMenu) && $activeMenu === 'lien-he') echo 'active'; ?>">
                        <a href="lien-he">
                            <span>Liên hệ</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="global">
                <img src="public/default/img/icon/global.png" alt=" " />
            </div>
        </div>
        <div class="slider">
            <div class="slider-bar">
                <img src="public/default/img/icon/slider-bar.png" alt=" " />
            </div>
            <div class="shadown-slider">
                <img src="public/default/img/icon/sd-slider.png" alt=" " />
            </div>
            <?php
                if(!isset($slider)|| count($slider)==0){
                    $slider = $this->mslider->listAll();
                    $link_slider = 'slider';    
                }
            ?>
            <div class="list-project" <?php if($link_slider !== 'slider') echo 'style="display: none"'; ?>>
                <ul>
                    <?php foreach($slider as $s){ ?>
                    <li>
                        <a href="<?php echo $s['link'] ?>">
                            <span><?php echo $s['title'] ?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="title-project-slider">
                <ul>
                    <?php foreach($slider as $s){ ?>
                    <li>
                        <a href="<?php echo $s['link'] ?>">
                            <div class="title-text-project-slider">
                                <span><?php echo $s['title'] ?></span>
                            </div>
                            <div class="desc-project-slider">
                                <?php echo $s['description'] ?>
                            </div>
                            <div class="chitiet-text">
                                <span>Chi tiết</span>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <script>
                jQuery(document).ready(function ($) {	
            		var _SlideshowTransitions = [
                    //Fade
                    {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
                    {$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Opacity:2},
                    {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
                    {$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Opacity:2},
                    {$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Opacity:2},
                    {$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Opacity:2}
                    ];
            
                    var options = {
                        $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                        $AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                        $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                        $PauseOnHover: 0,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
            
                        $ArrowKeyNavigation: false,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                        $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                        $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                        $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                        //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                        //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                        $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                        $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                        $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                        $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                        $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                        $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            
                        
            
                        $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                            $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                            $ChanceToShow: 2
                        },
            
                        $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                            $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                            $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        },
            			$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                            $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                            $Transitions: _SlideshowTransitions            //[Required] An array of slideshow transitions to play slideshow
                
                        }
                    };
            
                    var jssor_slider1 = new $JssorSlider$("slider1_container", options);
                    //responsive code end
                });
            </script>
            <!-- Jssor Slider Begin -->
            <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
            <div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1280px; height: 500px; overflow: hidden;">
                <!-- Slides Container -->
                <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 1280px; height: 500px; overflow: hidden;">
                    <?php
                        foreach($slider as $s){
                            echo '
                                <div class="list-slider">
                                    <img src="public/'.$link_slider.'/'.$s['image'].'" class="center" />
                                </div>
                            ';
                        } 
                    ?>
                </div>
                <div class="bt-slider">
                    <span u="arrowleft" class="jssora01l" style="width: 1px; height: 1px;"></span>
                    <!-- Arrow Right -->
                    <span u="arrowright" class="jssora01r" style="width: 1px; height: 1px;"></span>
                </div>
            </div>
            <div class="button-slider">
                <div class="button-prev" u="arrowleft">
                    <img src="public/default/img/icon/prev-slider.png" alt=" " />
                </div>
                <div class="button-next" u="arrowright">
                    <img src="public/default/img/icon/next-slider.png" alt=" " />
                </div>
            </div>
        </div>
        <div class="hotline">
            <img src="public/default/img/icon/hotline.png" alt=" " />
            <p>
                <span>Hotline:</span>
                <br />
                <span><?php echo $this->mconfig->getByKey('hotline') ?></span>
            </p>
        </div>
        <div class="clr30"></div>