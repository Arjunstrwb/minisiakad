<?php
include_once (__DIR__ . "/DB.php");
class DataDosen{
    private $table_name='dosen_pa';
    private $db = null;
	public 	$nip_dosen = null;
	private $nama_dosen = null;
	private $golongan = null;
	private $jabatan = null;

	
    function __construct(){
        if ($this->db ==  null){
            $conn = new DB();
            $this->db = $conn->db;
        }
    }
	 function setValue($nip_dosen,$nama_dosen,$golongan,$jabatan){
        //$this();
        $this->nip_dosen = $nip_dosen;
        $this->nama_dosen = $nama_dosen;
        $this->golongan = $golongan;
        $this->jabatan = $jabatan;
        // echo "set value dipanggil";
    }
	
	function deleteValue($nip_dosen,$nama_dosen,$golongan,$jabatan){
        //$this();
        $this->nip_dosen = $nip_dosen;
        $this->nama_dosen = $nama_dosen;
        $this->golongan = $golongan;
        $this->jabatan = $jabatan;
        // echo "set value dipanggil";
	
	}
	
	function create(){
        $count= count($this->getDatadosen($this->nip_dosen));
        if ($count>0){
            http_response_code(503);
            return array('msg' => "Hayooo Data nya sudah ada ngapain disimpen lagi" );
        }
        else if ($this->nip_dosen == null){
            http_response_code(503);
            return array('msg' => "Kode tidak boleh kosong, tidak berhasil disimpan" );
        } else {
            $kueri = "INSERT INTO ".$this->table_name." SET ";
            $kueri .= "nip_dosen='".$this->nip_dosen."',";
            $kueri .= "nama_dosen='".$this->nama_dosen."',";
            $kueri .= "golongan='".$this->golongan."',";
            $kueri .= "jabatan='".$this->jabatan."'";
            $hasil = $this->db->query($kueri);
            if ($hasil){
                http_response_code(201);
                return array('msg'=>'Horeeee! Data berhasil disimpan');
            } else {
                http_response_code(503);    
                return array('msg'=>'Data Gagal Disimpan '.$this->db->error); 
            }
            // return array('msg'=>$kueri);
        }
    }
	
	function delete(){
        $kueri = "DELETE FROM ".$this->table_name." WHERE nip_dosen='".$this->nip_dosen."'";
		$hasil = $this->db->query($kueri);
		if ($hasil) {
			http_response_code(201);
			return array('msg' =>'Okeee bosque.... Data udah dihapus');
		} else {
			http_response_code(503);
			return array('msg' => 'Data Gagal Terhapus '.$this->db->error);
		}
	}


    function getAll(){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name." ORDER BY nip_dosen";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
	}
		 function getDatadosen($kode){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name;
        $kueri .=" WHERE nip_dosen='".$kode."'";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
}