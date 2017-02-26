<?php
class Contact extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Contact - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Contact - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Contact - '.$this->mconfig->getByKey('page_description');
        $this->_data['image_fb'] = base_url().'public/config/'.$this->mconfig->getByKey('image_fb');
        $this->_data['activeMenu'] ='contact';
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/contact/index');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('contact/index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function send() {
        $arr = array(
            'name'=>$_POST['name'],
            'address'=>$_POST['address'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'message'=>$_POST['message'],
            'created'=>time()
        );
        $this->mcontact->add($arr);
        echo 'Sending Success. Thank you so much and we will contact to you as soon as posiable!';
    }
 }