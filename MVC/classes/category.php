<?php
	include '../lib/database.php';
	include '../helpers/format.php';
	/**
	 * 
	 */
	class category 
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db =new Database();
			$this->fm =new Format();
		}
		public function insert_category($catName){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);

			if(empty($catName)){
				$alert = "<span class='success'>Category must be not empty</span>";
				return $alert;
			}else{
				$query ="INSERT INTO tbl_category(catName) VALUES ('$catName')" ;
				$result = $this->db->insert($query);
				if($result){
					$alert ="<span class='success'>Insert category Successfully</span>";
					return $alert;
				}else{
					$alert ="<span class='success'>Insert category not Successfully</span>";
					return $alert;
				}
			}
		}
		public function show_category(){
				$query ="SELECT * FROM tbl_category ORDER BY catId desc" ;
				$result = $this->db->select($query);
				return $result;
		}
		public function update_category($catName,$id){
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($catName)){
				$alert = "<span class='success'>Category must be not empty</span>";
				return $alert;
			}else{
				$query ="UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'" ;
				$result = $this->db->update($query);
				if($result){
					$alert ="<span class='success'>Update category Successfully</span>";
					return $alert;
				}else{
					$alert ="<span class='success'>Update category not Successfully</span>";
					return $alert;
				}
			}
		}
		public function del_category($id){
			$query ="DELETE FROM tbl_category WHERE catId ='$id'" ;
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Delete category Successfully</span>";
				return $alert;
			}else{
					$alert ="<span class='success'>Delete category not Successfully</span>";
					return $alert;
				}
		}
		public function getcatbyId($id){
			$query ="SELECT * FROM tbl_category WHERE catId ='$id'" ;
			$result = $this->db->select($query);
			return $result;
		}
	}
?>
