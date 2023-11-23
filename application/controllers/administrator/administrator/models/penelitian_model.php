<?php

class penelitian_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getPenelitian($a,$b){

		$query = $this->db->prepare("select * from penelitian order by id_penelitian DESC limit :a,:b"); 
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countPenelitian(){

		$query = $this->db->prepare("select * from penelitian");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getPenelitianById($id){

		$query = $this->db->prepare("select * from penelitian where id_penelitian = :id_penelitian");
		$query->bindParam(':id_penelitian',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getGaleriDetilById($id){

		$query = $this->db->prepare("select * from album_detail where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	public function getAnggotaPenelitianById($id){

		$query = $this->db->prepare("select * from penelitian_anggota where id_penelitian = :id and nama_dosen != '' order by id asc");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function insertAnggotaPenelitian($id_penelitian,$nama_dosen){
		
		$query = $this->db->prepare("INSERT INTO `penelitian_anggota` SET 	
																`id_penelitian` = :id_penelitian,
																`nama_dosen` = :nama_dosen
		");
		$query->bindParam(':id_penelitian',$id_penelitian);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function insertAnggotaPenelitianDB($id_penelitian,$nama_dosen,$db){
		
		$query = $this->db->prepare("INSERT INTO ".$db.".penelitian_anggota SET 	
																`id_penelitian` = :id_penelitian,
																`nama_dosen` = :nama_dosen
		");
		$query->bindParam(':id_penelitian',$id_penelitian);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function updatePenelitianDB($id_penelitian,$judul_penelitian,$ketua_penelitian,$anggota_penelitian_1,$anggota_penelitian_2,$anggota_penelitian_3,$anggota_penelitian_4,$tahun_penelitian,$sumber_dana,$abstrak, $gambar,$tujuan_penilitian,$manfaat_penilitian,$hasil_penilitian,$grant_abstrak,$nama_lab,$kata_kunci,$durasi_penelitian,$db){
		
		$query = $this->db->prepare("update ".$db.".penelitian SET 	`judul_penelitian` = :judul_penelitian,
																`ketua_penelitian` = :ketua_penelitian,
																`anggota_penelitian_1` = :anggota_penelitian_1,
																`anggota_penelitian_2` = :anggota_penelitian_2,
																`anggota_penelitian_3` = :anggota_penelitian_3,
																`anggota_penelitian_4` = :anggota_penelitian_4,
																`tahun_penelitian` = :tahun_penelitian,
																`sumber_dana` = :sumber_dana,
																`abstrak` = :abstrak,
																`tujuan_penilitian` = :tujuan_penilitian,
																`manfaat_penilitian` = :manfaat_penilitian,
																`hasil_penilitian` = :hasil_penilitian,
																`nama_lab` = :nama_lab,
																`kata_kunci` = :kata_kunci,
																`grant_abstrak` = :grant_abstrak,
																`abstrak_img` = :abstrak_img,
																`durasi_penelitian` = :durasi_penelitian
																where id_penelitian = :id_penelitian
		");
		$query->bindParam(':id_penelitian',$id_penelitian,PDO::PARAM_STR);
		$query->bindParam(':judul_penelitian',$judul_penelitian,PDO::PARAM_STR);
		$query->bindParam(':ketua_penelitian',$ketua_penelitian);
		$query->bindParam(':anggota_penelitian_1',$anggota_penelitian_1);
		$query->bindParam(':anggota_penelitian_2',$anggota_penelitian_2);
		$query->bindParam(':anggota_penelitian_3',$anggota_penelitian_3);
		$query->bindParam(':anggota_penelitian_4',$anggota_penelitian_4);
		$query->bindParam(':tahun_penelitian',$tahun_penelitian);
		$query->bindParam(':durasi_penelitian',$durasi_penelitian);
		$query->bindParam(':abstrak_img',$gambar);
		$query->bindParam(':grant_abstrak',$grant_abstrak);
		$query->bindParam(':kata_kunci',$kata_kunci);
		$query->bindParam(':nama_lab',$nama_lab);
		$query->bindParam(':hasil_penilitian',$hasil_penilitian);
		$query->bindParam(':manfaat_penilitian',$manfaat_penilitian);
		$query->bindParam(':tujuan_penilitian',$tujuan_penilitian);
		$query->bindParam(':abstrak',$abstrak);
		$query->bindParam(':sumber_dana',$sumber_dana);

		$query->bindParam(':id_penelitian',$id_penelitian,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateAnggotaPenelitian($id_penelitian,$nama_dosen,$id){
		
		$query = $this->db->prepare("UPDATE `penelitian_anggota` SET `nama_dosen` = :nama_dosen
																where 
																`id_penelitian` = :id_penelitian and `nama_dosen` = :id
		");
		$query->bindParam(':id',$id);
		$query->bindParam(':id_penelitian',$id_penelitian);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function updateAnggotaPenelitianDB($id_penelitian,$nama_dosen,$id,$db){
		
		$query = $this->db->prepare("UPDATE ".$db.".penelitian_anggota SET `nama_dosen` = :nama_dosen
																where 
																`id_penelitian` = :id_penelitian and `nama_dosen` = :id
		");
		$query->bindParam(':id',$id);
		$query->bindParam(':id_penelitian',$id_penelitian);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function insertPenelitian($judul_penelitian,$ketua_penelitian,$anggota_penelitian_1,$anggota_penelitian_2,$anggota_penelitian_3,$anggota_penelitian_4,$tahun_penelitian,$sumber_dana, $abstrak, $gambar,$tujuan_penilitian,$manfaat_penilitian,$hasil_penilitian,$grant_abstrak,$nama_lab,$kata_kunci){
		
		$query = $this->db->prepare("INSERT INTO `penelitian` SET 	`judul_penelitian` = :judul_penelitian,
																`ketua_penelitian` = :ketua_penelitian,
																`anggota_penelitian_1` = :anggota_penelitian_1,
																`anggota_penelitian_2` = :anggota_penelitian_2,
																`anggota_penelitian_3` = :anggota_penelitian_3,
																`anggota_penelitian_4` = :anggota_penelitian_4,
																`tahun_penelitian` = :tahun_penelitian,
																`sumber_dana` = :sumber_dana,
																`abstrak` = :abstrak,
																`tujuan_penilitian` = :tujuan_penilitian,
																`manfaat_penilitian` = :manfaat_penilitian,
																`hasil_penilitian` = :hasil_penilitian,
																`nama_lab` = :nama_lab,
																`kata_kunci` = :kata_kunci,
																`grant_abstrak` = :grant_abstrak,
																`abstrak_img` = :abstrak_img
		");
		$query->bindParam(':judul_penelitian',$judul_penelitian,PDO::PARAM_STR);
		$query->bindParam(':ketua_penelitian',$ketua_penelitian);
		$query->bindParam(':anggota_penelitian_1',$anggota_penelitian_1);
		$query->bindParam(':anggota_penelitian_2',$anggota_penelitian_2);
		$query->bindParam(':anggota_penelitian_3',$anggota_penelitian_3);
		$query->bindParam(':anggota_penelitian_4',$anggota_penelitian_4);
		$query->bindParam(':tahun_penelitian',$tahun_penelitian);
		$query->bindParam(':abstrak_img',$gambar);
		$query->bindParam(':grant_abstrak',$grant_abstrak);
		$query->bindParam(':kata_kunci',$kata_kunci);
		$query->bindParam(':nama_lab',$nama_lab);
		$query->bindParam(':hasil_penilitian',$hasil_penilitian);
		$query->bindParam(':manfaat_penilitian',$manfaat_penilitian);
		$query->bindParam(':tujuan_penilitian',$tujuan_penilitian);
		$query->bindParam(':abstrak',$abstrak);
		$query->bindParam(':sumber_dana',$sumber_dana);
		try{
			$query->execute();
			
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	}
	
	public function insertPenelitianDB($judul_penelitian,$ketua_penelitian,$anggota_penelitian_1,$anggota_penelitian_2,$anggota_penelitian_3,$anggota_penelitian_4,$tahun_penelitian,$sumber_dana, $abstrak, $gambar,$tujuan_penilitian,$manfaat_penilitian,$hasil_penilitian,$grant_abstrak,$nama_lab,$kata_kunci,$link,$durasi_penelitian,$db){

		$query = $this->db->prepare("INSERT INTO ".$db.".penelitian  SET 	`judul_penelitian` = :judul_penelitian,
																`ketua_penelitian` = :ketua_penelitian,
																`anggota_penelitian_1` = :anggota_penelitian_1,
																`anggota_penelitian_2` = :anggota_penelitian_2,
																`anggota_penelitian_3` = :anggota_penelitian_3,
																`anggota_penelitian_4` = :anggota_penelitian_4,
																`tahun_penelitian` = :tahun_penelitian,
																`sumber_dana` = :sumber_dana,
																`abstrak` = :abstrak,
																`tujuan_penilitian` = :tujuan_penilitian,
																`manfaat_penilitian` = :manfaat_penilitian,
																`hasil_penilitian` = :hasil_penilitian,
																`nama_lab` = :nama_lab,
																`kata_kunci` = :kata_kunci,
																`grant_abstrak` = :grant_abstrak,
																`durasi_penelitian` = :durasi_penelitian,
																`abstrak_img` = :abstrak_img,
																`link` = :link
		");
		$query->bindParam(':judul_penelitian',$judul_penelitian,PDO::PARAM_STR);
		$query->bindParam(':ketua_penelitian',$ketua_penelitian);
		$query->bindParam(':anggota_penelitian_1',$anggota_penelitian_1);
		$query->bindParam(':anggota_penelitian_2',$anggota_penelitian_2);
		$query->bindParam(':anggota_penelitian_3',$anggota_penelitian_3);
		$query->bindParam(':anggota_penelitian_4',$anggota_penelitian_4);
		$query->bindParam(':tahun_penelitian',$tahun_penelitian);
		$query->bindParam(':durasi_penelitian',$durasi_penelitian);
		$query->bindParam(':link',$link);
		$query->bindParam(':abstrak_img',$gambar);
		$query->bindParam(':grant_abstrak',$grant_abstrak);
		$query->bindParam(':kata_kunci',$kata_kunci);
		$query->bindParam(':nama_lab',$nama_lab);
		$query->bindParam(':hasil_penilitian',$hasil_penilitian);
		$query->bindParam(':manfaat_penilitian',$manfaat_penilitian);
		$query->bindParam(':tujuan_penilitian',$tujuan_penilitian);
		$query->bindParam(':abstrak',$abstrak);
		$query->bindParam(':sumber_dana',$sumber_dana);
		try{
			$query->execute();
			
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
	}
	
	public function updatePenelitian($id_penelitian,$judul_penelitian,$ketua_penelitian,$anggota_penelitian_1,$anggota_penelitian_2,$anggota_penelitian_3,$anggota_penelitian_4,$tahun_penelitian,$sumber_dana){
		
		$query = $this->db->prepare("update `penelitian` SET 	`judul_penelitian` = :judul_penelitian,
																`ketua_penelitian` = :ketua_penelitian,
																`anggota_penelitian_1` = :anggota_penelitian_1,
																`anggota_penelitian_2` = :anggota_penelitian_2,
																`anggota_penelitian_3` = :anggota_penelitian_3,
																`anggota_penelitian_4` = :anggota_penelitian_4,
																`tahun_penelitian` = :tahun_penelitian,
																`sumber_dana` = :sumber_dana
																where id_penelitian = :id_penelitian
		");
		$query->bindParam(':id_penelitian',$id_penelitian,PDO::PARAM_STR);
		$query->bindParam(':judul_penelitian',$judul_penelitian);
		$query->bindParam(':ketua_penelitian',$ketua_penelitian);
		$query->bindParam(':anggota_penelitian_1',$anggota_penelitian_1);
		$query->bindParam(':anggota_penelitian_2',$anggota_penelitian_2);
		$query->bindParam(':anggota_penelitian_3',$anggota_penelitian_3);
		$query->bindParam(':anggota_penelitian_4',$anggota_penelitian_4);
		$query->bindParam(':tahun_penelitian',$tahun_penelitian);
		$query->bindParam(':sumber_dana',$sumber_dana);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deletePenelitian($id){
		
			
			$sql="DELETE FROM `penelitian` WHERE `id_penelitian` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			$sql="DELETE FROM `penelitian_anggota` WHERE `id_penelitian` = ?";
			$query2 = $this->db->prepare($sql);
			$query2->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
				$query2->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	public function deleteAnggotaPenelitian($id){
		
			$sql="DELETE FROM `penelitian_anggota` WHERE `id` = ?";
			$query2 = $this->db->prepare($sql);
			$query2->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query2->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	
	public function lastInsertId(){
		
		return	$this->db->lastInsertId();
		
	}
	

}
?>
