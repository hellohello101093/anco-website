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
                    <a href="news">
                        <span>News</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="list-news">
        <div class="fix">
            <ul>
                <?php foreach($data as $d){ ?>
                <li>
                    <a href="news/<?php echo $d['link'] ?>">
                        <div class="content-news">
                            <div class="img-news">
                                <img src="public/duan/<?php echo $d['avatar'] ?>" alt=" " />
                            </div>
                            <div class="cover-image-news"></div>
                            <div class="info-news">
                                <div class="title-news">
                                    <span><?php echo $d['title'] ?></span>
                                </div>
                                <div class="clr"></div>
                                <div class="desc-news">
                                    <?php echo $d['desc'] ?>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                        <div class="clr15"></div>
                        <div class="bt-news">
                            <span>Read More</span>
                        </div>
                        <div class="clr"></div>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <?php if($showMore){ ?>
            <div class="clr20"></div>
            <div class="show-more">
                <button><span>View More</span></button>
            </div>
            <div class="clr10"></div>
            <?php } ?>
        </div>
    </div>
    <div class="clr20"></div>
</section>
<script>
    $(document).ready(function(){
        $('body').on('click','.show-more button', function(){
            var start = $('.list-news ul li').length; 
            $.post('default/project/loadMore',{start:start}, function(data){
                $('.list-news ul').append(data);
            })
        })
    })
</script>