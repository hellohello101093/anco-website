<footer>
    <div class="doitac">
        <div class="title-doitac-index">
            <span>Đối tác</span>
            <div class="button-doitac-index">
                <div class="button-prev-doitac-index">
                    <img src="public/default/img/icon/prev.png" alt=" " />
                </div>
                <div class="button-next-doitac-index">
                    <img src="public/default/img/icon/next.png" alt=" " />
                </div>
            </div>
        </div>
        <div class="list-doitac">
            <ul>
                <?php $doitac = $this->mfooter_slider->listAll(); foreach($doitac as $data) { ?>
                <li>
                    <a href="<?php echo $data['link'] ?>">
                        <img src="public/footer_slider/<?php echo $data['image'] ?>" alt=" " />
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="clr"></div>
    <div class="footer">
        <span>&copy;2017. <?php echo $this->mconfig->getByKey('tencty') ?></span>
        <a href="<?php echo $this->mconfig->getByKey('link_gg') ?>"><img src="public/default/img/icon/gg.png" alt=" " /></a>
        <a href="<?php echo $this->mconfig->getByKey('link_pr') ?>"><img src="public/default/img/icon/pr.png" alt=" " /></a>
        <a href="<?php echo $this->mconfig->getByKey('link_tw') ?>"><img src="public/default/img/icon/tw.png" alt=" " /></a>
        <a href="<?php echo $this->mconfig->getByKey('link_fb') ?>"><img src="public/default/img/icon/fb.png" alt=" " /></a>
    </div>
    <div class="clr"></div>
    <div class="sd-footer">
        
    </div>
</footer>
</div>
</body>