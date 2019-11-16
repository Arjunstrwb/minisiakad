<?php
include_once (__DIR__ . "/DB.php");
class DataSiakadMahasiswa{
    private $table_name='mahasiswa';
    private $db = null;
	public 	$npm = null;
	private $nama = null;
	private $jenis_kelamin = null;
	private $alamat = null;
	private $no_hp = null;
	private $program_study = null;
	private $jurusan = null;
	private $dosen_pa = null;
	private $semester = null;
	private $index_prestasi = null;
	private $index_prestasi_kumulatif = null;
	
	
    function __construct(){
        if ($this->db ==  null){
            $conn = new DB();
            $this->db = $conn->db;
        }
    }
	 function setValue($npm,$nama,$jenis_kelamin,$alamat,$no_hp,$program_study,$jurusan,$dosen_pa,$semester,$index_prestasi,$index_prestasi_kumulatif){
        //$this();
        $this->npm = $npm;
        $this->nama = $nama;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->alamat = $alamat;
        $this->no_hp = $no_hp;
        $this->program_study = $program_study;
		$this->jurusan = $jurusan;
		$this->dosen_pa = $dosen_pa;
		$this->semester = $semester;
		$this->index_prestasi = $index_prestasi;
		$this->index_prestasi_kumulatif = $index_prestasi_kumulatif;
        // echo "set value dipanggil";
    }
	
	function deleteValue($npm,$nama,$jenis_kelamin,$alamat,$no_hp,$program_study,$jurusan,$dosen_pa,$semester,$index_prestasi,$index_prestasi_kumulatif){
        //$this();
        $this->npm = $npm;
        $this->nama = $nama;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->alamat = $alamat;
        $this->no_hp = $no_hp;
        $this->program_study = $program_study;
		$this->jurusan = $jurusan;
		$this->dosen_pa = $dosen_pa;
		$this->semester = $semester;
		$this->index_prestasi = $index_prestasi;
		$this->index_prestasi_kumulatif = $index_prestasi_kumulatif;
        // echo "set value dipanggil";
	
	}
	
	function create(){
        $count= count($this->getDataSiakad($this->npm));
        if ($count>0){
            http_response_code(503);
            return array('msg' => "Hayooo Data nya sudah ada ngapain disimpen lagi" );
        }
        else if ($this->npm == null){
            http_response_code(503);
            return array('msg' => "Kode tidak boleh kosong, tidak berhasil disimpan" );
        } else {
            $kueri = "INSERT INTO ".$this->table_name." SET ";
            $kueri .= "npm='".$this->npm."',";
            $kueri .= "nama='".$this->nama."',";
            $kueri .= "jenis_kelamin='".$this->jenis_kelamin."',";
            $kueri .= "alamat='".$this->alamat."',";
            $kueri .= "no_hp='".$this->no_hp."',";
            $kueri .= "program_study='".$this->program_study."',";
			$kueri .= "jurusan='".$this->jurusan."',";
			$kueri .= "dosen_pa='".$this->dosen_pa."',";
			$kueri .= "semester='".$this->semester."'";
			$kueri .= "index_prestasi='".$this->index_prestasi."'";
			$kueri .= "index_prestasi_kumulatif='".$this->index_prestasi_kumulatif."'";
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
        $kueri = "DELETE FROM ".$this->table_name." WHERE npm='".$this->npm."'";
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
        $kueri = "SELECT * FROM ".$this->table_name." ORDER BY npm";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
	}
		 function getDataSiakad($kode){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name;
        $kueri .=" WHERE npm='".$kode."'";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
}