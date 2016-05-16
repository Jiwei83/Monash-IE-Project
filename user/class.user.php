<?php

require_once('dbconfig.php');

class USER
{
	private $conn;

	//constructor of the user class
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	//prepare the sql statement
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	//user register function
	public function register($uname,$umail,$upass, $ufname, $ulname, $udob, $uphone, $upostcode, $usuburb, $uaddress, $ufsize, $uinterest, $upno)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass)
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);
				
			$stmt->execute();

			$query = $this->conn->prepare("INSERT INTO user_profile (user_fname, user_lname, dob, phone, email, postcode, suburb, address, family_size, interest, pet_number)
										   VALUES (:ufname, :ulname, :udob, :uphone, :umail,:upostcode, :usuburb, :uaddress, :ufsize, :uinterest, :upno)");

			$query->bindparam(":ufname", $ufname);
			$query->bindparam(":ulname", $ulname);
			$query->bindparam(":udob", $udob);
			$query->bindParam(":uphone", $uphone);
			$query->bindParam(":umail", $umail);
			$query->bindParam(":upostcode", $upostcode);
			$query->bindParam(":usuburb", $usuburb);
			$query->bindParam(":uaddress", $uaddress);
			$query->bindParam(":ufsize", $ufsize);
			$query->bindParam(":uinterest", $uinterest);
			$query->bindParam(":upno", $upno);

			$query->execute();

			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	//user login function
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	//check the user login status
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	//redirect function
	public function redirect($url)
	{
		header("Location: $url");
	}

	//user logout function
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

}
?>