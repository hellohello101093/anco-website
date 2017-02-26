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
                    <a href="events">
                        <span>Events</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="list-news list-events">
        <div class="fix">
            <ul>
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
                                    <?php echo $d['date'] != '' ? $d['date'] : 'Updating' ?>
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
            $.post('default/events/loadMore',{start:start}, function(data){
                $('.list-news ul').append(data);
            })
        })
    })
</script>