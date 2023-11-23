<?php

class artikel_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function countCariArtikel($katacari){
		$katacari = htmlentities(strip_tags($katacari),ENT_QUOTES,'utf-8'); // sanitasi filter
		$katacari = filter_var($katacari, FILTER_SANITIZE_MAGIC_QUOTES);
		
		$query = $this->db->prepare("select * from artikel where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(isi, '') LIKE CONCAT('%', :katacari2, '%')  order by tanggal desc ");
		try{
		$query->bindParam(':katacari',$katacari,PDO::PARAM_STR);
		$query->bindParam(':katacari2',$katacari,PDO::PARAM_STR);
		$query->execute();
		return $query->rowCount();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		}
		
	public function cariArtikel($katacari,$a,$b){

		$query = $this->db->prepare("select * from artikel where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(isi, '') LIKE CONCAT('%', :katacari2, '%')  order by tanggal desc LIMIT :a,:b");
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

	public function getArtikel($bahasa,$a,$b){

		$query = $this->db->prepare("select * from artikel where bahasa = :bahasa order by id desc limit :a , :b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		$query->bindParam(':bahasa',$bahasa,PDO::PARAM_STR);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getArtikelByCari($cari,$a,$b){

		$query = $this->db->prepare("select * from artikel where `judul` LIKE  :cari or `isi` LIKE :cari2 order by id desc limit :a , :b");
		$cari = "%".$cari."%";
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		$query->bindParam(':cari',$cari,PDO::PARAM_STR);
		$query->bindParam(':cari2',$cari,PDO::PARAM_STR);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function countArtikel(){

		$query = $this->db->prepare("select * from artikel order by id desc");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	
	public function getArtikelById($id, $bahasa){

		$query = $this->db->prepare("select * from artikel where id = :id and bahasa = :bahasa");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		$query->bindParam('bahasa',$bahasa,PDO::PARAM_STR);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
	
	public function insertArtikel($judul,$link,$isi,$gambar,$penulis,$kategori){
		
		$query = $this->db->prepare("INSERT INTO `artikel` SET 	judul = :judul,
																isi = :isi, 
																gambar = :gambar,
																tanggal = :tanggal,
																kategori = :kategori,
																penulis = :penulis,
																link = :link
		");
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':isi',$isi,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar);
		$query->bindParam(':tanggal',date("Y-m-d"));
		$query->bindParam(':kategori',$kategori);
		$query->bindParam(':penulis',$penulis);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function updateArtikel($judul,$link,$isi,$gambar,$penulis,$kategori,$id){
		
		$query = $this->db->prepare("UPDATE `artikel` SET 	judul = :judul,
																isi = :isi, 
																gambar = :gambar,
																tanggal = :tanggal,
																kategori = :kategori,
																penulis = :penulis,
																link = :link
																where id = :id
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':isi',$isi,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar);
		$query->bindParam(':tanggal',date("Y-m-d"));
		$query->bindParam(':kategori',$kategori);
		$query->bindParam(':penulis',$penulis);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function deleteArtikel($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `artikel` WHERE `id` = ?";
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