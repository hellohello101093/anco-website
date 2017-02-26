<?php
class Product extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($link){
        $this->_data['product'] = $this->mproduct->getByLink($link);
        $this->_data['title'] = $this->_data['product']['name'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['product']['keyword'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['product']['info'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['image_fb'] = base_url().'public/config/'.$this->mconfig->getByKey('image_fb');
        $this->_data['activeMenu'] ='categories';
        $this->_data['category'] = $this->mcategory->getById($this->_data['product']['category']);
        $this->_data['products'] = $this->mproduct->listAll(6,0);
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/product/detail');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('product/detail',$this->_data);
        $this->load->view('components/footer');
	}
    public function loadSize(){
        $product_id = $_POST['product_id'];
        $material = $_POST['material'];
        $listSize = $this->mattribute->getListSize($product_id,$material);
        foreach($listSize as $size){
            $imagesSize = json_decode($size['images'], true);
            echo '<option data-image="'.$imagesSize[0].'" value="'.$size['id'].'">'.$size['size'].'</option>';
        }
    }
 }