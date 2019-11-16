function update($nama=null,$npm,$jurusan=null,$prog_studi=null,$dosen_pa=null,$dosen_pa=null,$semester=null,$tahun_ajaran=null,$ip_smt_lalu=null,$jumlah_sks=null){
        $hasil= $this->getDataMahasiswa($npm);
        $count=count($hasil["data"]);
        // return $hasil["data"][0]["npm"];
        if ($count==0){
            http_response_code(503);
            return array('msg' => "Data tidak  ada, tidak dapat disimpan" );
        } 
        else if ($npm == null){
            http_response_code(503);
            return array('msg' => "Kode tidak boleh kosong, tidak berhasil disimpan" );
        } else {
            $this->setValue($hasil["data"][0]["nama"],
                    $hasil["data"][0]["npm"],
                    $hasil["data"][0]["jurusan"],
                    $hasil["data"][0]["prog_studi"],
                    $hasil["data"][0]["dosen_pa"],
                    $hasil["data"][0]["semester"],
					$hasil["data"][0]["tahun_ajaran"],
					$hasil["data"][0]["ip_smt_lalu"],
					$hasil["data"][0]["jumlah_sks"]
                    );
                    
            if ($nama!=null) $this->nama=$nama;
            if ($npm!=null) $this->npm=$npm;
            if ($jurusan!=null) $this->jurusan=$jurusan;
            if ($prog_studi!=null) $this->prog_studi=$prog_studi;
            if ($dosen_pa!=null) $this->dosen_pa=$dosen_pa;
			if ($semester!=null) $this->semester=$semester;
			if ($tahun_ajaran!=null) $this->tahun_ajaran=$tahun_ajaran;
			if ($ip_smt_lalu!=null) $this->ip_smt_lalu=$ip_smt_lalu;
			if ($jumlah_sks!=null) $this->jumlah_sks=$jumlah_sks;
           
            $kueri = "UPDATE ".$this->table_name." SET ";
            $kueri .= "nama='".$this->nama."',";
            $kueri .= "jurusan='".$this->jurusan."',";
            $kueri .= "prog_studi='".$this->prog_studi."',";
            $kueri .= "dosen_pa='".$this->dosen_pa."',";
            $kueri .= "semester='".$this->semester."'";
			$kueri .= "tahun_ajaran='".$this->tahun_ajaran."'";
			$kueri .= "ip_smt_lalu='".$this->ip_smt_lalu."'";
			$kueri .= "jumlah_sks='".$this->jumlah_sks."'";
            $kueri .= " WHERE npm='".$this->npm."'";
            $hasil = $this->db->query($kueri);
            if ($hasil){
                http_response_code(201);
                return array('msg'=>'success','kueri'=>$kueri);
            } else {
                http_response_code(503);    
                return array('msg'=>'Data Gagal Disimpan '.$this->db->error." ".$kueri); 
            }
            // return array('msg'=>$kueri);
        }
    }