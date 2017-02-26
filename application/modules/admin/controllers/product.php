<?phpclass product extends MY_Controller{    public function __construct(){        parent::__construct();        $this->_data['now'] = 'Product';        $this->load->model('mproduct');        $this->load->model('mcategory');        $this->load->model('mattribute');        $user = $this->session->userdata('user');        if(!$user || $user['user_type'] != 'administrator'){            redirect(base_url()."admin/login");        }        $this->form_validation->CI =& $this;                //url upload        $this->_gallery_url = base_url()."public/product/";        //đường dẫn vật lý        $this->_gallery_path = realpath(APPPATH. "../public/product");    }    public function listall(){        if(!isset($_GET['per_page'])){            $start = 0 ;        }else{            $start=$_GET['per_page'];        }        if(!isset($_GET['s'])){            $s = '' ;        }else{            $s=$_GET['s'];        }        $this->_data['s'] = $s;        $this->load->library('pagination');        $config['base_url'] = base_url().'admin/product/listall?s='.$s;        //config phân trang        $config['total_rows'] = $this->mproduct->numRows($s);        $config['per_page'] =15;        $config['uri_segment'] = 4;        $config['cur_tag_open'] = "<li><a><font color='black'>";        $config['cur_tag_close'] = '</font></a></li>';        $config['num_tag_open'] = '<li>';        $config['num_tag_close'] = '</li>';        $config['prev_link'] = 'Prev';        $config['prev_tag_open'] = '<li>';        $config['prev_tag_close'] = '</li>';        $config['next_link'] = 'Next';        $config['next_tag_open'] = '<li>';        $config['next_tag_close'] = '</li>';        $config['first_tag_open'] = '<li>';        $config['first_tag_close'] = '</li>';        $config['last_tag_open'] = '<li>';        $config['last_tag_close'] = '</li>';        $this->pagination->initialize($config);        $this->_data['pagination']=$this->pagination->create_links();        $this->_data['template'] = 'admin/product/list_view';        $this->_data['title'] = 'Trang ';        $this->_data['info'] = $this->mproduct->listAll($config['per_page'],$start,$s);        $this->load->view("layout/admin",$this->_data);    }    public function duplicate($id){        $product = $this->mproduct->getById($id);        $name = $product['name'].' - '.uniqid();        $link = $this->generateLink2($name);        $arr = array(            'name' => $name,            'keyword' => $product['keyword'],            'link' => $link,            'info' => $product['info'],            'content' => $product['content'],            'code' => $product['code'].uniqid(),            'category' => $product['category'],            'price' => $product['price'],            'bestsell' => $product['bestsell'],            'featured' => $product['featured'],            'created' => $product['created'],            'updated' => $product['updated'],            'is_copy'=>'true'        );        $id2 = $this->mproduct->add($arr);        redirect(base_url()."admin/product/edit/".$id2);    }        public function updateSize(){        $products = $this->mproduct->getAll();        foreach($products as $product) {            $materials = $this->mattribute->getListMaterial($product['id']);            foreach($materials as $material) {                $sizes = array('SX','S','M','L','XL','XXL');                $listSize = $this->mattribute->getListSize($product['id'],$material['material']);                $path = $this->_gallery_path.'/'.$product['id'].'/'.$listSize[0]['id'];                $defaultId = $listSize[0]['id'];                $imageDefault = $listSize[0]['images'];                $setPath = false;                foreach($listSize as $size) {                    if(in_array($size['size'],$sizes) && !$setPath){                        $path = $this->_gallery_path.'/'.$product['id'].'/'.$size['id'];                        $defaultId = $size['id'];                        $imageDefault = $size['images'];                        $setPath = true;                        if (($key = array_search($size['size'], $sizes)) !== false) {                            unset($sizes[$key]);                        }                    } else {                        if($size['id'] != $defaultId) {                            echo 'deleted Item';                            $this->deleteDir($this->_gallery_path.'/'.$product['id'].'/'.$size['id']);                            $this->mattribute->del($size['id']);                        }                    }                }                foreach($sizes as $size) {                    $data = array(                        'product_id' => $product['id'],                        'material' => $material['material'],                        'size' => $size,                        'images' => $imageDefault,                        'avatar' => 0,                        'created' => time()                    );                    $id = $this->mattribute->add($data);                    $dest = $this->_gallery_path.'/'.$product['id'].'/'.$id;                    $this->copyr($path, $dest);                }                if (!$setPath) {                    echo 'deleted default';                    $this->mattribute->del($listSize[0]['id']);                    $this->deleteDir($path);                }            }        }            echo 'done';    }        private function addAttribute($product_id) {        $this->load->library("upload");        $numAttribute = $this->input->post('numAttribute');        for($i=0; $i<$numAttribute; $i++){            $size = array('SX','S','M','L','XL','XXL');            for($j=0;$j<6;$j++) {                if($this->input->post('idAttribute'.$i.'-'.$j)) {                    $randomId = $this->input->post('idAttribute'.$i.'-'.$j);                    } else {                    $randomId = uniqid();                   }                $path = $this->_gallery_path.'/'.$product_id.'/'.$randomId;                $config = array(                    'upload_path'   => $path,                    'allowed_types' => 'gif|jpg|png|jpeg',                    'max_size'      => '2000'                );                $this->upload->initialize($config);                if(!is_dir($path)) //create the folder if it's not already exists                {                    mkdir($path,0777,TRUE);                    mkdir($path.'/thumbnail',0777,TRUE);                }                //----------------                if(!$this->upload->do_multi_upload("images".$i)){                    if ($this->input->post('idAttribute'.$i.'-'.$j)) {                        $attribute = $this->mattribute->getById($this->input->post('idAttribute'.$i.'-'.$j));                        $data_images = $attribute['images'];                                            } else {                        $data_images = '';                       }                                    } else {                    $data =$this->upload->get_multi_upload_data();                     $images  = array();                    foreach($data as $val){                        $images[] = $val['file_name'];                        $this->_create_thumb($val['file_name'],$path);                    }                    $data_images = json_encode($images);                   }                $material = $this->input->post('material'.$i);                $arr = array(                    'product_id' => $product_id,                    'material' => json_encode($material),                    'size' => $size[$j],                    'images' => $data_images,                    'avatar' => 0,                    'created' => time()                );                if($this->input->post('idAttribute'.$i.'-'.$j)) {                    $this->mattribute->editById($this->input->post('idAttribute'.$i.'-'.$j),$arr);                } else {                    $id = $this->mattribute->add($arr);                    $newpath = $this->_gallery_path.'/'.$product_id.'/'.$id;                    rename($path, $newpath);                   }            }        }    }        public function delMaterial() {        $material = $_POST['material'];        $product_id = $_POST['product_id'];        $attribute = $this->mattribute->getByMaterial($material, $product_id);        if ($attribute) {            $this->mattribute->del($attribute['id']);            $path = $this->_gallery_path.'/'.$product_id.'/'.$attribute['id'];            $this->deleteDir($path);           }        echo 'ok';    }    public function delSize() {        $material = $_POST['material'];        $size = $_POST['size'];        $product_id = $_POST['product_id'];        $attribute = $this->mattribute->getBySize($material, $size, $product_id);        $this->mattribute->del($attribute['id']);        $path = $this->_gallery_path.'/'.$product_id.'/'.$attribute['id'];        $this->deleteDir($path);        echo 'ok';    }        public function add(){        $this->_data['action'] = strtolower(__FUNCTION__);        if(isset($_POST['ok'])){            $this->form_validation->set_rules("link","Link","callback_check_link");            $time = strtotime($this->input->post('date_update').' '.$this->input->post('time_update'));            if($this->form_validation->run()==TRUE){                $arr = array(                    'name' => $this->input->post('name'),                    'keyword' => $this->input->post('keyword'),                    'info' => $this->input->post('info'),                    'link' => $this->input->post('link'),                    'category' => $this->input->post('category'),                    'price' => $this->input->post('price'),                    'bestsell' => $this->input->post('bestsell'),                    'featured' => $this->input->post('featured'),                    'code' => $this->input->post('code'),                    'content' => $this->input->post('content'),                    'is_copy' => '',                    'created' => $time,                    'updated' => $time,                );                $product_id = $this->mproduct->add($arr);                $this->addAttribute($product_id);                if($_POST['ok']=='back'){                    $this->session->set_flashdata('ses_flash',"Thêm");                    redirect(base_url()."admin/product/listall");                }else{                    redirect(base_url()."admin/product/edit/".$product_id);                }            }            $arr = array(                'name' => $this->input->post('name'),                'keyword' => $this->input->post('keyword'),                'info' => $this->input->post('info'),                'link' => $this->input->post('link'),                'category' => $this->input->post('category'),                'price' => $this->input->post('price'),                'bestsell' => $this->input->post('bestsell'),                'featured' => $this->input->post('featured'),                'code' => $this->input->post('code'),                'content' => $this->input->post('content'),                'is_copy' => '',                'created' => $time,                'updated' => $time,            );            $this->_data['info'] = $arr;        }        $this->_data['template'] = 'admin/product/modify_view';        $this->_data['title'] = 'Trang Thêm  ';        $this->load->view("layout/admin",$this->_data);    }        public function check_link($link){        if($this->mproduct->checkLink($link)==false){            $this->form_validation->set_message("check_link","Tên sản phẩm đã được sử dụng .");            return false;        }else{            return true;        }    }    public function check_masp($link){        if($this->mproduct->checkMasp($link)==false){            $this->form_validation->set_message("check_masp","Mã sản phẩm đã được sử dụng .");            return false;        }else{            return true;        }    }    public function del($id){        $this->mproduct->del($id);        $this->mattribute->delByProduct($id);        $path = $this->_gallery_path.'/'.$id;        $this->deleteDir($path);        $this->session->set_flashdata('ses_flash',"Xóa");        redirect(base_url()."admin/product/listall");    }    public function dellist(){        foreach($_POST['del'] as $id){            $this->mproduct->del($id);            $path = $this->_gallery_path.'/'.$id;            $this->deleteDir($path);        }        $this->session->set_flashdata('ses_flash',"Xóa");        redirect(base_url()."admin/product/listall");    }    public function edit($id){        $this->_data['action'] = strtolower(__FUNCTION__);        $this->_data['info'] = $this->mproduct->getById($id);        $info = $this->_data['info'];        if(isset($_POST['ok'])){            $time = strtotime($this->input->post('date_update').' '.$this->input->post('time_update'));            $this->form_validation->set_rules("name","Tên","required");            if($info['link']!= $this->input->post('link')){                $this->form_validation->set_rules("link","Link","callback_check_link");            }            if($this->form_validation->run()==TRUE){                $arr = array(                    'name' => $this->input->post('name'),                    'keyword' => $this->input->post('keyword'),                    'info' => $this->input->post('info'),                    'link' => $this->input->post('link'),                    'category' => $this->input->post('category'),                    'price' => $this->input->post('price'),                    'bestsell' => $this->input->post('bestsell'),                    'featured' => $this->input->post('featured'),                    'code' => $this->input->post('code'),                    'content' => $this->input->post('content'),                    'is_copy' => '',                    'created' => $time,                    'updated' => $time,                );                                $this->addAttribute($id);                $this->mproduct->editById($id,$arr);                if($_POST['ok']=='back'){                    $this->session->set_flashdata('ses_flash',"Thêm");                    redirect(base_url()."admin/product/listall");                }else{                    redirect(base_url()."admin/product/edit/".$id);                }            }        }        $this->_data['template'] = 'admin/product/modify_view';        $this->_data['title'] = 'Trang Sửa User ';        $this->load->view("layout/admin",$this->_data);    }            public function generateLink(){        $this->load->helper('text');        $name = $_POST['name'];        $generate = strtolower(url_title(removesign($name,'dash',true)));        echo $generate;    }    public function generateLink2($name){        $this->load->helper('text');        $generate = strtolower(url_title(removesign($name,'dash',true)));        return $generate;    }    public function image($id){        $this->_data['id'] = $id;        $this->_data['url'] =   base_url().'admin/product/upload/'.$id ;        $this->_data['template'] = 'admin/product/image';        $this->_data['title'] = 'Trang Quản Lý Hình Ảnh ';        $this->load->view("layout/upload",$this->_data);    }    public function upload($id){        $this->load->view("layout/UploadHandler",$this->_data);        $options = array(            'script_url' =>base_url().'admin/product/upload/'.$id,            'upload_dir' =>  $this->_gallery_path.'/'.$id.'/',            'upload_url' => base_url().'public/product/'.$id.'/',            'image_versions' => array(                'thumbnail' => array(                    'max_width' => 340,                    'max_height' => 485                )            )        );        $upload_handler = new UploadHandler($options,$id);        if(!isset($_GET['file'])){            $tam =  $upload_handler->getJson();            foreach($tam['files'] as $val){                $images[] = $val->name;            }        }else{            $info = $this->mproduct->getById($id);            $images = json_decode($info['images'],true);            $pos = array_search( $_GET['file'],$images);            unset($images[$pos]);        }        $data_images = json_encode($images);        $arr = array(            'images' => $data_images,            'avatar'=>0        );        $this->mproduct->editById($id,$arr);    }    private function _create_thumb($source,$path){        $this->load->library('image_lib');        $config = array(            "image_library"=>"gd2",            "source_image"=>$path.'/'.$source,            "new_image"=>$path.'/thumbnail/'.$source,            "maintain_ratio"=>TRUE,            "width"=>"340",            "height"=>"485"        );        $this->image_lib->initialize($config);        $this->image_lib->resize();        $this->image_lib->clear();    }    public static function deleteDir($dirPath) {        if (! is_dir($dirPath)) {            //  throw new InvalidArgumentException("$dirPath must be a directory");        }        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {            $dirPath .= '/';        }        $files = glob($dirPath . '*', GLOB_MARK);        foreach ($files as $file) {            if (is_dir($file)) {                self::deleteDir($file);            } else {                unlink($file);            }        }        rmdir($dirPath);    }        function copyr($src, $dst) {        $dir = opendir($src);        @mkdir($dst);        while(false !== ( $file = readdir($dir)) ) {            if (( $file != '.' ) && ( $file != '..' )) {                if ( is_dir($src . '/' . $file) ) {                    $this->copyr($src . '/' . $file,$dst . '/' . $file);                }                else {                    copy($src . '/' . $file,$dst . '/' . $file);                }            }        }        closedir($dir);    }    public function avatar(){        $id = $_POST['id'];        $avatar = $_POST['avatar'];        $arr = array(            'avatar' => $avatar,        )   ;        $this->mproduct->editById($id,$arr);    }    public function avatar_att(){        $id = $_POST['id'];        $this->mattribute->resetAvatar($id);        $avatar = $_POST['avatar'];        $mausac = $_POST['name_link'];        $arr = array(            'avatar' => $avatar,        )   ;        $this->mattribute->editByIdColor($id,$mausac,$arr);    }        public function attribute($id,$attribute){        $this->_data['id'] = $id;        $this->_data['url'] =   base_url().'admin/product/attribute_img/'.$id.'/'.$attribute ;        $this->_data['template'] = 'admin/product/image';        $this->_data['title'] = 'Trang Quản Lý Hình Ảnh ';        $this->load->view("layout/upload",$this->_data);    }        public function del_attribute($id,$color){        $path = $this->_gallery_path.'/'.$id.'/attribute/'.$color;        $this->deleteDir($path);        $this->mattribute->del($id,$color);        redirect(base_url()."admin/product/edit/".$id);    }        public function del_attribute_sub($id,$product_id){        $this->mattribute->del2($id);        redirect(base_url()."admin/product/edit/".$product_id);    }        public function changeStatus(){        $id = $_POST['id'];        $arr = array(            'status'=>$_POST['val']        );        $this->mproduct->editById($id,$arr);    }    public function attribute_img($id,$attribute){        $this->load->view("layout/UploadHandler",$this->_data);        $options = array(            'script_url' =>base_url().'admin/product/attribute_img/'.$id.'/'.$attribute,            'upload_dir' =>  $this->_gallery_path.'/'.$id.'/'.$attribute.'/',            'upload_url' => base_url().'public/product/'.$id.'/'.$attribute.'/',            'image_versions' => array(                'thumbnail' => array(                    'max_width' => 340,                    'max_height' => 485                )            )        );        $upload_handler = new UploadHandler($options,$id);        $ck = true;        $images = array();        if(!isset($_GET['file'])){            $tam =  $upload_handler->getJson();                        foreach($tam['files'] as $val){                array_push($images, $val->name);            }        }else{            $info = $this->mattribute->getById($attribute);            $images = json_decode($info['images'],true);            $pos = array_search( $_GET['file'],$images);            unset($images[$pos]);        }        $data_images = json_encode($images);        $arr = array(            'images' => $data_images,        );        $this->mattribute->editById($attribute,$arr);    }    //--------------------    public function phieubanhang(){            $this->load->model('mproduct');            $this->_data['product'] = $this->mproduct->getAll();            $this->load->view("admin/product/phieubanhang",$this->_data);    }    public function ajax_product(){        $id  = $_POST['id'];        $this->load->model('mproduct');        $this->load->model('mattribute');        $attribute = $this->mattribute->getByProduct($id);        $product = $this->mproduct->getById($id);        echo json_encode(array('product'=>$product,'attr'=>$attribute));    }    public function save(){        $detail = json_decode($_POST['detail']);        $this->load->model('mproduct');        foreach($detail as $val){            $tam = $this->mproduct->getById($val[5]);            $this->mproduct->editById($val[5],array('sell'=>$tam['sell']+$val[3] ));        }        $this->load->model('mphieubanhang');        $arr = $_POST;        $arr['date'] = $_POST['nam'].'-'.$_POST['thang'].'-'.$_POST['ngay'];        $this->mphieubanhang->add($arr);    }    //-----------------------------------    public function convert()	{        $tong  = $_POST['tong'];        echo ucfirst($this->convert_text($tong) . ' đồng .');    }    function convert_text($number) {        $hyphen      = ' ';        $conjunction = ' ';        $separator   = ' ';        $negative    = 'negative ';        $decimal     = ' phẩy ';        $dictionary  = array(            0                   => 'không',            1                   => 'một',            2                   => 'hai',            3                   => 'ba',            4                   => 'bốn',            5                   => 'năm',            6                   => 'sáu',            7                   => 'bảy',            8                   => 'tám',            9                   => 'chín',            10                  => 'mười',            11                  => 'mười một',            12                  => 'mười hai',            13                  => 'mười ba',            14                  => 'mười bốn',            15                  => 'mười năm',            16                  => 'mười sáu',            17                  => 'mười bảy',            18                  => 'mười tám',            19                  => 'mười chín',            20                  => 'hai mươi',            30                  => 'ba mươi',            40                  => 'bốn mươi',            50                  => 'năm mươi',            60                  => 'sáu mươi',            70                  => 'bảy mươi',            80                  => 'tám mươi',            90                  => 'chín mươi',            100                 => 'trăm',            1000                => 'ngàn',            1000000             => 'triệu',            1000000000          => 'tỷ',            1000000000000       => 'nghìn tỷ',            1000000000000000    => 'ngàn triệu triệu',            1000000000000000000 => 'tỷ tỷ'        );        if (!is_numeric($number)) {            return false;        }        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {// overflow            trigger_error(                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,                E_USER_WARNING            );            return false;        }        if ($number < 0) {            return $negative . $this->convert_text(abs($number));        }        $string = $fraction = null;        if (strpos($number, '.') !== false) {            list($number, $fraction) = explode('.', $number);        }        switch (true) {            case $number < 21:                $string = $dictionary[$number];                break;            case $number < 100:                $tens   = ((int) ($number / 10)) * 10;                $units  = $number % 10;                $string = $dictionary[$tens];                if ($units) {                    $string .= $hyphen . $dictionary[$units];                }                break;            case $number < 1000:                $hundreds  = $number / 100;                $remainder = $number % 100;                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];                if ($remainder) {                    $string .= $conjunction . $this->convert_text($remainder);                }                break;            default:                $baseUnit = pow(1000, floor(log($number, 1000)));                $numBaseUnits = (int) ($number / $baseUnit);                $remainder = $number % $baseUnit;                $string = $this->convert_text($numBaseUnits) . ' ' . $dictionary[$baseUnit];                if ($remainder) {                    $string .= $remainder < 100 ? $conjunction : $separator;                    $string .= $this->convert_text($remainder);                }                break;        }        if (null !== $fraction && is_numeric($fraction)) {            /*            $string .= $decimal;            $words = array();            foreach (str_split((string) $fraction) as $number) {                $words[] = $dictionary[$number];            }            $string .= implode(' ', $words);            */        }        return $string;    }}