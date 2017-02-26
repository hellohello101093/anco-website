<?php
class Project extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'News - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'News - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'News - '.$this->mconfig->getByKey('page_description');
        $this->_data['image_fb'] = base_url().'public/config/'.$this->mconfig->getByKey('image_fb');
        $this->_data['activeMenu'] ='news';
        $this->_data['data'] = $this->mduan->listAll(6,0);
        $numRow = $this->mduan->numRows();
        $this->_data['showMore'] = $numRow > count ($this->_data['data']);
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/project/list');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('project/list',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function detail($link){
        $this->_data['data'] = $this->mduan->getByLink($link);
        $this->_data['title'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['image_fb'] = base_url().'public/config/'.$this->mconfig->getByKey('image_fb');
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/project/detail');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('project/detail',$this->_data);
        $this->load->view('components/footer');
    }
    public function loadMore(){
        $this->_data['data'] = $this->mduan->listAll(6,$_POST['start']);
        $numRow = $this->mduan->numRows();
        $this->_data['showMore'] = $numRow > $_POST['start']+6;
        echo $this->load->view('project/ajax', $this->_data);
    }
 }