<?php
include_once (__DIR__ . "/DB.php");
class DataProdi{
    private $table_name='program_studi';
    private $db = null;
	public 	$id_prodi = null;
	private $nama_prodi = null;

	
    function __construct(){
        if ($this->db ==  null){
            $conn = new DB();
            $this->db = $conn->db;
        }
    }
	 function setValue($id_prodi,$nama_prodi){
        //$this();
        $this->id_prodi = $id_prodi;
        $this->nama_prodi = $nama_prodi;
        // echo "set value dipanggil";
    }
	
	function deleteValue($id_prodi,$nama_prodi){
        //$this();
        $this->id_prodi = $id_prodi;
        $this->nama_prodi = $nama_prodi;
        // echo "set value dipanggil";
	
	}
	
	function create(){
        $count= count($this->getDataProdi($this->id_prodi));
        if ($count>0){
            http_response_code(503);
            return array('msg' => "Hayooo Data nya sudah ada ngapain disimpen lagi" );
        }
        else if ($this->id_prodi == null){
            http_response_code(503);
            return array('msg' => "Kode tidak boleh kosong, tidak berhasil disimpan" );
        } else {
            $kueri = "INSERT INTO ".$this->table_name." SET ";
            $kueri .= "id_prodi='".$this->id_prodi."',";
            $kueri .= "nama_prodi='".$this->nama_prodi."'";
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
        $kueri = "DELETE FROM ".$this->table_name." WHERE id_prodi='".$this->id_prodi."'";
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
        $kueri = "SELECT * FROM ".$this->table_name." ORDER BY id_prodi";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
	}
		 function getDataProdi($kode){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name;
        $kueri .=" WHERE id_prodi='".$kode."'";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
}