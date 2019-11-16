<?php
include_once (__DIR__ . "/DB.php");
class DataJurusan{
    private $table_name='jurusan';
    private $db = null;
	public 	$id_jurusan = null;
	private $nama_jurusan = null;

	
    function __construct(){
        if ($this->db ==  null){
            $conn = new DB();
            $this->db = $conn->db;
        }
    }
	 function setValue($id_jurusan,$nama_jurusan){
        //$this();
        $this->id_jurusan = $id_jurusan;
        $this->nama_jurusan = $nama_jurusan;
        // echo "set value dipanggil";
    }
	
	function deleteValue($id_jurusan,$nama_jurusan){
        //$this();
        $this->id_jurusan = $id_jurusan;
        $this->nama_jurusan = $nama_jurusan;
        // echo "set value dipanggil";
	
	}
	
	function create(){
        $count= count($this->getDataJurusan($this->id_jurusan));
        if ($count>0){
            http_response_code(503);
            return array('msg' => "Hayooo Data nya sudah ada ngapain disimpen lagi" );
        }
        else if ($this->id_jurusan == null){
            http_response_code(503);
            return array('msg' => "Kode tidak boleh kosong, tidak berhasil disimpan" );
        } else {
            $kueri = "INSERT INTO ".$this->table_name." SET ";
            $kueri .= "id_jurusan='".$this->id_jurusan."',";
            $kueri .= "nama_jurusan='".$this->nama_jurusan."'";
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
        $kueri = "DELETE FROM ".$this->table_name." WHERE id_jurusan='".$this->id_jurusan."'";
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
        $kueri = "SELECT * FROM ".$this->table_name." ORDER BY id_jurusan";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
	}
		 function getDataJurusan($kode){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name;
        $kueri .=" WHERE id_jurusan='".$kode."'";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
}