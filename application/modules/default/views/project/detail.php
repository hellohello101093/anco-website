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
                <li>
                    <a>
                        <span><?php echo $data['title'] ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="content-page">
        <div class="fix">
            <div class="title-page">
                <span><?php echo $data['title'] ?></span>
            </div>
            <div class="clr15"></div>
            <div class="ckeditor page-text">
                <?php echo $data['content'] ?>
            </div>
            <div class="clr20"></div>
        </div>
    </div>
    <div class="clr20"></div>
</section>