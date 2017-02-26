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
<?php if(!$showMore){ ?>
<script>
    $(document).ready(function(){
        $('.show-more').hide();
    })
</script>
<?php } ?>