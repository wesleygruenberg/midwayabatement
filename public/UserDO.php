<?php
class UserDO
{
	private $id;
	private $email;
	private $password;
	private $name;
	private $address;
	private $city;
	private $phone;
	
	
	public function __construct(array $row) {
		$this->id = isset($row['id']) ? $row['id'] : NULL;
		$this->email = isset($row['email']) ? $row['email'] : NULL;
		$this->password = isset($row['password']) ? $row['password'] : NULL;
		$this->name = isset($row['name']) ? $row['name'] : NULL;
		$this->phone = isset($row['phone']) ? $row['phone'] : NULL;
		$this->address = isset($row['address']) ? $row['address'] : NULL;
		$this->city = isset($row['city']) ? $row['city'] : NULL;
		
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
	public function setPhone($phone) {
		$this->phone = $phone;
	}
	public function getPhone() {
		return $this->phone;
	}
	public function setAddress($address) {
		$this->address = $address;
	}
	public function getAddress() {
		return $this->address;
	}
	public function setCity($city) {
		$this->city = $city;
	}
	public function getCity() {
		return $this->city;
	}
	public function asParamArray() {
		return [':id' => $this->id,
				':email' => $this->email,
				':password' => $this->password,
				':name' => $this->name,
				':phone' => $this->phone,
				':address' => $this->address,
				':city' => $this->city];
	}
	
}