<div class="portlet box blue">    <div class="portlet-title">        <div class="caption">            <i class="fa fa-reorder"></i>Quản Lý Trang        </div>        <div class="tools">            <a href="javascript:;" class="collapse">            </a>            <a href="javascript:;" class="reload">            </a>        </div>    </div>    <div class="portlet-body form">        <!-- BEGIN FORM-->        <form action='<?php echo base_url()?>admin/config/edit/<?php echo $type ?>' class="form-horizontal" method="post" enctype="multipart/form-data">            <div class="form-body">                <?php foreach($info as $key=>$val){                    if($val['style']=='text'){                ?>                        <div class="form-group">                            <label class="col-md-3 control-label"><?php echo $val['desc'] ?></label>                            <div class="col-md-4">                                <input type="text" name='<?php echo $key ?>' placeholder="" class='form-control' value='<?php echo $val['value']?>'>                            </div>                        </div>                    <?php } elseif($val['style']=='password') { ?>                        <div class="form-group">                            <label class="col-md-3 control-label"><?php echo $val['desc'] ?></label>                            <div class="col-md-4">                                <input type="password" name='<?php echo $key ?>' placeholder="<?php echo $val['desc'] ?>" class='form-control' value='<?php echo $val['value']?>'>                            </div>                        </div>                    <?php } elseif($val['style']=='editor') { ?>                        <div class="form-group">                            <label class="col-md-3 control-label"><?php echo $val['desc'] ?></label>                            <div class="col-md-9">                                <textarea name="<?php echo $key ?>" class="ckeditor"><?php echo $val['value'] ?></textarea>                            </div>                        </div>                    <?php } elseif($val['style']=='image'){ ?>                        <?php if($val['value']!=''){ ?>                        <div class="form-group">                            <label class="col-md-3 control-label"><?php echo $val['desc'] ?></label>                            <div class="col-md-4">                                <img style="max-width: 150px;" src="<?php echo base_url() ?>public/config/<?php echo $val['value'] ?>" />                            </div>                        </div>                        <?php } ?>                        <div class="form-group">                            <label class="col-md-3 control-label"><?php echo $val['desc'] ?></label>                            <div class="col-md-4">                                <input type="hidden" name="key_image[]" value="<?php echo $key ?>" />                                <input type="file" name="<?php echo $key ?>" class="file-input" title="Tải Hình Ảnh">                            </div>                        </div>                    <?php }elseif($val['style']=='bool'){ ?>                        <div class="form-group">                            <label class="col-md-3 control-label"><?php echo $val['desc'] ?></label>                            <div class="col-md-4">                                <input name="<?php echo $key ?>" type="hidden" value="false">                                <input name="<?php echo $key ?>" type="radio" <?php echo ($val['value']=='on')?"checked":"" ?> class="make-switch">                            </div>                        </div>                    <?php } elseif($val['style']=='pdf') { ?>                        <?php if($val['value']!=''){ ?>                        <div class="form-group">                            <label class="col-md-3 control-label"><?php echo $val['desc'].' Cũ' ?></label>                            <div class="col-md-4">                                <a class="btn blue" href="<?php echo base_url() ?>public/config/<?php echo $val['value'] ?>" target="_blank">Xem File PDF</a>                            </div>                        </div>                        <?php } ?>                    <div class="form-group">                        <label class="col-md-3 control-label"><?php echo $val['desc'] ?></label>                        <div class="col-md-4">                            <input type="hidden" name="key_pdf" value="<?php echo $key ?>">                                <input type="file" name="pdf" class="file-input" title="Tải File PDF">                        </div>                    </div>                    <?php } } ?>            </div>            <div class="form-actions nobg fluid">                <div class="col-md-offset-3 col-md-8">                    <button class="btn green" id='btn-ok' name='ok' type='submit'>Lưu Lại</button>                </div>            </div>        </form>        <!-- END FORM-->    </div></div>