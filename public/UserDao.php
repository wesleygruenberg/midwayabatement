<?php
require_once('Dao.php');
require_once('UserDO.php');
class UserDao
{
	private $conn;
	public function __construct() {
		try {
			$this->conn = Dao::getConnection();
		} catch (PDOException $e) {
			echo "Database connection failed.";
			echo $e->getMessage();
			die;
		}
	}
	/**
	 * Executes the statement and returns an array of users.
	 */
	protected function executeQuery($stmt)
	{
		if($stmt->execute()) {
			$results = $stmt->fetchAll();
			foreach($results as $result) {
				$users[] = new UserDO($result);
			}
		}
		return $users;
	}
	protected function getUsers()
	{
		$stmt = $this->conn->query("SELECT * FROM users");
		return $this->executeQuery($stmt);
	}
	protected function getUsersByKey($key, $value)
	{
		$stmt = $this->conn->prepare("SELECT * FROM users WHERE $key = :value");
		$stmt->bindParam(':value', $value);
		return $this->executeQuery($stmt);
	}
	/**
	 * Returns all rows in the users table.
	 */
	public function getUserById($value)
	{
		return $this->getUsersByKey('id', $value);
	}
	/**
	 *
	 */
	public function userExists($email)
	{
		$result = $this->getUsersByKey('email', $email);
		if(!empty($result)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Adds the user to the user table with the given .
	 * $user: A UserDO object.
	 */
	public function addUser($user)
	{
		$stmt = $this->conn->prepare("INSERT INTO users (email, password, name, address, city, phone) VALUES (:email, :password, :name, :address, :city, :phone)");
		
		$email = $user->getEmail();
		$password = $user->getPassword();
		$digest = password_hash($password, PASSWORD_DEFAULT);
		if(!$digest){
			throw new Exception("Password could not be hashed");
		}
		
		
		$name = $user->getName();
		$address = $user->getAddress();
		$city = $user->getCity();
		$phone = $user->getPhone();
		
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $digest);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':phone', $phone);
		$stmt->execute();
	}
	
	public function validateUser($email, $password){
		//$conn = $this->getConnection();
		
		$stmt = $this->$conn->prepare("SELECT password FROM users WHERE email = : email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		
		$row = $stmt ->fetch();
		if(!$row){
			return false;
		}
		$digest = $row['password'];
		
		return password_verify($password, $digest);
	}
}