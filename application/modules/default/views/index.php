<section>
    <div class="box-news-index">
        <div class="title-news-index">
            <span>Tin tức</span>
            <div class="button-news-index">
                <div class="button-prev-news-index">
                    <img src="public/default/img/icon/prev.png" alt=" " />
                </div>
                <div class="button-next-news-index">
                    <img src="public/default/img/icon/next.png" alt=" " />
                </div>
            </div>
        </div>
        <div class="list-news-index">
            <ul>
                <?php $news = $this->mduan->getAll(); foreach($news as $data) { ?>
                <li>
                    <a href="tin-tuc/chi-tiet/<?php echo $data['link'] ?>">
                        <div class="date-news">
                            <span><?php echo date('d/m/Y', $data['created']) ?></span>
                        </div>
                        <div class="title-news">
                            <span><?php echo $data['title'] ?></span>
                        </div>
                        <div class="desc-news">
                            <?php echo $data['desc'] ?>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>