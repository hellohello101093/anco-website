<?phpclass mpage extends CI_Model{    protected $_table='pages';    public function __construct(){        parent::__construct();    }    public function del($id){        $this->db->where('id',$id);        $this->db->delete($this->_table);    }    public function numRows(){        return $this->db->get($this->_table)->num_rows();    }    public function getByCode($code){        $this->db->where("code",$code);        return $this->db->get($this->_table)->row_array();    }    public function editByCode($code,$data){        $this->db->where("code",$code);        $this->db->update($this->_table,$data);    }    public function getAll(){        $this->db->select('*');        return $this->db->get($this->_table)->result_array();    }}