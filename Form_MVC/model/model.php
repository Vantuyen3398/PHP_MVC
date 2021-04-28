<?php  
	/**
	 * 
	 */
	class Model
	{
		function addUser($name, $email, $username, $password, $created,$avatar,$role){
			$created = date('Y-m-d h:i:s');
			if (file_exists("uploads/user.txt")) {
				$a = fopen("uploads/user.txt", "a");
				fwrite($a, $name.",".$email.",".$username.",".$password.",".$created.",".$avatar.",".$role."\r\n");
				
			}
		}

		function login($username, $password){
			if (file_exists("uploads/user.txt")) {
				$r = fopen("uploads/user.txt", "r");
				while(!feof($r)){
					$row = fgets($r);
					if (!empty($row)) {
						$members = explode(",", $row);
						if($members[2] == $username && $members[3] == $password){
							return true;
						}
					}
				}
				
			}
		}

		function chagnePass($email){
			if (file_exists("uploads/user.txt")) {
				$r = fopen("uploads/user.txt", "r");
				while (!feof($r)) {
					$row = fgets($r);
					if(!empty($row)){
						$arr = explode(",", $row);
						if ($arr[1] == $email) {
							return true;
						}
					}
				}
			}
		}

		function checkExistUser($email, $username){
			if(file_exists("uploads/user.txt")){
				$r = fopen("uploads/user.txt", "r");
				while (!feof($r)) {
					$row = fgets($r);
					if (!empty($row)) {
						$arr = explode(",", $row);
						if ($arr[1] == $email || $arr[2] == $username){
							return true;
						}
					}
				}
			}
		}
		function getAllUser(){
			$file = "uploads/user.txt";
			if (file_exists($file)) {
				$r = fopen($file, "r");
				while (!feof($r)) {
					$row = fgets($r);
					if (!empty($row)) {
						$members[] = explode(",", $row);
					}
				}
				return $members;
			}
		}
		function searchUser($keyword){
			$matches = array();
			$handle = @fopen("uploads/user.txt", "r");
			if ($handle)
			{
			    while (!feof($handle))
			    {
			        $buffer = fgets($handle);
			        if(strpos($buffer, $keyword) !== FALSE)
			            $matches[] = explode(",", $buffer);
			    }
			    // fclose($handle);
			    return $matches;
			}
		}
		function deleteUser($username){
			$matches = array();
			$handle = @fopen("uploads/user.txt", "r");
			if ($handle)
			{
			    while (!feof($handle))
			    {
			        $buffer = fgets($handle);
			        if(strpos($buffer, $username) !== FALSE)
			            $matches[] = explode(",", $buffer);
			    	}
			    }
			    if($matches !== FALSE){
			    	unset($handle[$matches]);
				}
				// $newFile[] = implode(",", $matches); 
			 //    $handle = fopen("uploads/user.txt", "w");
			 //    if ($handle) {
			 //        fwrite($handle, $newFile); 
			 //        fclose($handle);
			 //    }
		}
		function Pagination(){
		}
	}
?>