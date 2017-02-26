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
                    <a href="contact">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clr30"></div>
    <div class="content-page">
        <div class="fix">
            <div class="contact-left f-l">
                <div class="title-contact">
                    <span>Personal Information</span>
                </div>
                <div class="clr5"></div>
                <form id="form-lienhe" method="post">
                <div class="item-contact">
                    <div class="text-contact">
                        <span>Name</span>
                    </div>
                    <div class="input-contact">
                        <input type="text" name="name" required="" />
                    </div>
                </div>
                <div class="clr"></div>
                <div class="item-contact">
                    <div class="text-contact">
                        <span>Address</span>
                    </div>
                    <div class="input-contact">
                        <input type="text" name="address" required="" />
                    </div>
                </div>
                <div class="clr"></div>
                <div class="item-contact">
                    <div class="text-contact">
                        <span>Phone</span>
                    </div>
                    <div class="input-contact">
                        <input type="text" name="phone" required="" />
                    </div>
                </div>
                <div class="clr"></div>
                <div class="item-contact">
                    <div class="text-contact">
                        <span>Email</span>
                    </div>
                    <div class="input-contact">
                        <input type="email" name="email" required="" />
                    </div>
                </div>
                <div class="clr"></div>
                <div class="item-contact">
                    <div class="text-contact">
                        <span>Content</span>
                    </div>
                    <div class="input-contact">
                        <textarea name="message" required=""></textarea>
                    </div>
                </div>
                <div class="clr"></div>
                <button type="submit">Send</button>
                </form>
            </div>
            <div class="contact-right f-r">
                <div class="title-contact">
                    <span>Contact Information</span>
                </div>
                <div class="clr5"></div>
                <div class="map">
                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBmUJRsLyXe35m1HdUxroYXfxgtwmRNpHE'></script><div style='overflow:hidden;height:122px;width:475px;'><div id='gmap_canvas' style='height:122px;width:475px;'></div><div><small><a href="http://www.embedgooglemaps.com/en/">Generate your map here, quick and easy!									Give your customers directions									Get found</a></small></div><div><small><a href="https://binaireoptieservaringen.nl/">Meer info</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(60.1412479,11.164363600000001),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(60.1412479,11.164363600000001)});infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>Såvegen 17, 2050 Jessheim, Na Uy<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                </div>
                <div class="clr5"></div>
                <div class="box-follow">
                    <p><b>Address: </b><span><?php echo $this->mconfig->getByKey('address') ?></span></p>
                    <p><b>Tel: </b><span><?php echo $this->mconfig->getByKey('tel') ?></span></p>
                    <p><b>Email: </b><span><?php echo $this->mconfig->getByKey('email') ?></span></p>
                    <p><b>Opening hours: </b><span><?php echo $this->mconfig->getByKey('open') ?></span></p>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr20"></div>
</section>