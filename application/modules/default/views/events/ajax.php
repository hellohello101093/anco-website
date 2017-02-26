<?php foreach($data as $d){ ?>
<li>
    <a href="events/<?php echo $d['link'] ?>">
        <div class="content-news">
            <div class="img-events">
                <img src="public/events/<?php echo $d['avatar'] ?>" alt=" " />
            </div>
            <div class="cover-image-news cover-image-events"></div>
            <div class="info-news">
                <div class="title-news">
                    <span><?php echo $d['title'] ?></span>
                </div>
                <div class="clr"></div>
                <div class="time-news">
                    <?php echo date('d-m-Y', $d['created']) ?>
                </div>
                <div class="clr"></div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="bt-news bt-events">
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