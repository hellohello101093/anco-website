<?php
class Page extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = $this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->mconfig->getByKey('page_description');
        $this->_data['image_fb'] = base_url().'public/config/'.$this->mconfig->getByKey('image_fb');
        $this->_data['activeMenu'] ='about';
        $this->_data['page'] = $this->mpage->getByCode('about');
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/page/gioithieu');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('page/gioithieu',$this->_data);
        $this->load->view('components/footer');
	}
 }