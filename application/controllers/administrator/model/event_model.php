<?php

class event_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function countCariEvent($katacari){
		$katacari = htmlentities(strip_tags($katacari),ENT_QUOTES,'utf-8'); // sanitasi filter
		$katacari = filter_var($katacari, FILTER_SANITIZE_MAGIC_QUOTES);
		
		$query = $this->db->prepare("select * from event where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(konten, '') LIKE CONCAT('%', :katacari2, '%')  order by id desc ");
		try{
		$query->bindParam(':katacari',$katacari,PDO::PARAM_STR);
		$query->bindParam(':katacari2',$katacari,PDO::PARAM_STR);
		$query->execute();
		return $query->rowCount();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		}
		
	public function cariEvent($katacari,$a,$b){

		$query = $this->db->prepare("select * from event where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(konten, '') LIKE CONCAT('%', :katacari2, '%')  order by id desc LIMIT :a,:b");
		$query->bindParam(':katacari',$katacari,PDO::PARAM_STR);
		$query->bindParam(':katacari2',$katacari,PDO::PARAM_STR);
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
		
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		
		}catch(PDOException $e){
			die($e->getMessage());
		}
		}

	public function getEvent($a,$b){

		$query = $this->db->prepare("select * from event WHERE `tanggal_mulai` BETWEEN DATE_SUB(NOW(), INTERVAL 5 DAY) AND DATE_ADD(NOW(), INTERVAL 30 DAY) order by tanggal_mulai  asc limit :a , :b "); // interval 3 hari yang lalu dan 30 hari kedepan
		// SELECT * FROM `artikel` WHERE `tanggal_mulai` BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND DATE_ADD(NOW(), INTERVAL 7 DAY)
		
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
	public function getEventBesar($a,$b){

		$query = $this->db->prepare("select * from event WHERE :now <= tanggal_mulai  order by tanggal_mulai  asc limit :a , :b "); // interval 3 hari yang lalu dan 30 hari kedepan
		// SELECT * FROM `artikel` WHERE `tanggal_mulai` BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND DATE_ADD(NOW(), INTERVAL 7 DAY)
		$tanggal = date('Y-m-d');
		$query->bindParam(':now',$tanggal);
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countEvent(){

		$query = $this->db->prepare("select * from event ");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	
	public function getEventById($id){

		$query = $this->db->prepare("select * from event where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
	
	public function insertEvent($judul,$link,$konten,$gambar,$penulis,$tanggal_mulai,$tanggal_selesai,$tempat,$long,$lat,$penulis){
		
		$query = $this->db->prepare("INSERT INTO `event` SET 
																		`judul`= :judul,
																		`konten`=:konten,
																		`tanggal_mulai`=:tanggal_mulai,
																		`tanggal_selesai`=:tanggal_selesai,
																		`tempat`=:tempat,
																		`longitude`=:longitue,
																		`latitude`=:latitude,
																		`gambar`=:gambar,
																		`penulis`=:penulis,
																		`link`=:link
																");
		$query->bindValue(':judul',$judul,PDO::PARAM_STR);
		$query->bindValue(':konten',$konten,PDO::PARAM_STR);
		$query->bindValue(':gambar',$gambar);
		$query->bindValue(':tanggal_mulai',$tanggal_mulai);
		$query->bindValue(':tanggal_selesai',$tanggal_selesai);
		$query->bindValue(':tempat',$tempat);
		$query->bindValue(':longitue',$long);
		$query->bindValue(':latitude',$lat);
		$query->bindValue(':penulis',$penulis);
		$query->bindValue(':link',$link);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function updateEvent($judul,$link,$konten,$gambar,$penulis,$tanggal_mulai,$tanggal_selesai,$tempat,$long,$lat,$penulis,$id){
		
		$query = $this->db->prepare("UPDATE `event` SET 	`judul`= :judul,
															`konten`=:konten,
															`tanggal_mulai`=:tanggal_mulai,
															`tanggal_selesai`=:tanggal_selesai,
															`tempat`=:tempat,
															`longitude`=:longitue,
															`latitude`=:latitude,
															`gambar`=:gambar,
															`penulis`=:penulis,
															`link`=:link
															where id = :id
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindValue(':judul',$judul,PDO::PARAM_STR);
		$query->bindValue(':konten',$konten,PDO::PARAM_STR);
		$query->bindValue(':gambar',$gambar);
		$query->bindValue(':tanggal_mulai',$tanggal_mulai);
		$query->bindValue(':tanggal_selesai',$tanggal_selesai);
		$query->bindValue(':tempat',$tempat);
		$query->bindValue(':longitue',$long);
		$query->bindValue(':latitude',$lat);
		$query->bindValue(':penulis',$penulis);
		$query->bindValue(':link',$link);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function insertAkreditasi($nama_dokumen,$keterangan_dokumen){
		$nama_file = "nama_file";
		$standar_1 = 1;
		$standar_2 = 1;
		$standar_3 = 1;
		$standar_4 = 1;
		$standar_5 = 1;
		$standar_6 = 1;
		$standar_7 = 1;
		$query = $this->db->prepare("INSERT INTO `dokumen_akreditasi` SET 
																		`nama_dokumen`= :nama_dokumen,
																		`keterangan_dokumen`=:keterangan_dokumen,
																		`nama_file` = :nama_file,
																		`standar_1` = :standar_1,
																		`standar_2` = :standar_2,
																		`standar_3` = :standar_3,
																		`standar_4` = :standar_4,
																		`standar_5` = :standar_5,
																		`standar_6` = :standar_6,
																		`standar_7` = :standar_7
																");
		$query->bindParam(':nama_dokumen',$nama_dokumen,PDO::PARAM_STR);
		$query->bindParam(':keterangan_dokumen',$keterangan_dokumen,PDO::PARAM_STR);
		$query->bindValue(':nama_file',$nama_file,PDO::PARAM_STR);
		$query->bindValue(':standar_1',$standar_1,PDO::PARAM_INT);
		$query->bindValue(':standar_2',$standar_2,PDO::PARAM_INT);
		$query->bindValue(':standar_3',$standar_3,PDO::PARAM_INT);
		$query->bindValue(':standar_4',$standar_4,PDO::PARAM_INT);
		$query->bindValue(':standar_5',$standar_5,PDO::PARAM_INT);
		$query->bindValue(':standar_6',$standar_6,PDO::PARAM_INT);
		$query->bindValue(':standar_7',$standar_7,PDO::PARAM_INT);

		try{
			$query->execute();
			return die($query->execute());
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function deleteEvent($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `event` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_INT);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}	


}
?>