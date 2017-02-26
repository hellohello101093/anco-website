<!-- BEGIN SIDEBAR MENU -->
<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone">
    </div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
<li class="sidebar-search-wrapper" style="height: 20px">

</li>
<li class="start">
    <a href="<?php echo base_url()?>admin">
        <i class="fa fa-home"></i>
						<span class="title">
							Trang Chủ
						</span>
						<span class="selected">
						</span>
    </a>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Danh Mục
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/category/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Danh Mục
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/category/add">
                <i class="fa fa-pencil"></i>
                Thêm Danh Mục
            </a>
        </li>
    </ul>
</li>
<!-- Product -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Sản Phẩm
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/product/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Sản Phẩm
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/product/add">
                <i class="fa fa-pencil"></i>
                Thêm Sản Phẩm
            </a>
        </li>
    </ul>
</li>
<!-- Supplier-->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Đối Tác - Khách Hàng
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/footer_slider/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Đối Tác
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/footer_slider/add">
                <i class="fa fa-pencil"></i>
                Thêm Đối Tác
            </a>
        </li>
    </ul>
</li>
<!-- News -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Tin Tức
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/duan/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Tin Tức
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/duan/add">
                <i class="fa fa-pencil"></i>
                Thêm Tin Tức
            </a>
        </li>
    </ul>
</li>
<!-- News -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Sự Kiện
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/events/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Sự Kiện
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/events/add">
                <i class="fa fa-pencil"></i>
                Thêm Sự Kiện
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Video
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/video/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Video
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/video/add">
                <i class="fa fa-pencil"></i>
                Thêm Video
            </a>
        </li>
    </ul>
</li>
<!-- Page -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Quản Lý Trang
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <?php $this->load->model('mpage'); $pages = $this->mpage->getAll(); foreach($pages as $p){ ?>
        <li>
            <a href="<?php echo base_url()?>admin/page/info/<?php echo $p['code'] ?>">
                <i class="fa fa-tasks"></i>
                <?php echo $p['name'] ?>
            </a>
        </li>
        <?php } ?>
    </ul>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
		<span class="title">
			Slider
		</span>
		<span class="arrow ">
		</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/slider/listall">
                <i class="fa fa-tasks"></i>
                Slider PC
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/slider_mobile/listall">
                <i class="fa fa-tasks"></i>
                Slider Mobile - Tablet
            </a>
        </li>
    </ul>
</li>
<!-- Contact -->
<li>
    <a href="<?php echo base_url()?>admin/contact/listall">
        <i class="fa fa-list"></i>
						<span class="title">
							Liên Hệ
						</span>

    </a>
</li>
<!-- User -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Thành Viên
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/user/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Thành Viên
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/user/add">
                <i class="fa fa-pencil"></i>
                Thêm Thành Viên
            </a>
        </li>
    </ul>
</li>
<!-- Config -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Cài Đặt
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/seo">
                <i class="fa fa-gear"></i>
                SEO
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/info">
                <i class="fa fa-gear"></i>
                Thông Tin
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/bank">
                <i class="fa fa-gear"></i>
                Ngân Hàng
            </a>
        </li>
    </ul>
</li>


<li class="last ">
    <a href="<?php echo base_url() ?>admin/login/logout">
        <i class="fa fa-bar-chart-o"></i>
        <span class="title">
            Logout
        </span>
    </a>
</li>
</ul>
<!-- END SIDEBAR MENU -->