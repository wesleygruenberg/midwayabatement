/*	--List all user emails. Design a query to select the email column from all users in the users table.
	SELECT email FROM users;
*/
	public function getAllUserRows(){
		
		$conn = $this->getConnection();
		
		return $conn->query("SELECT * FROM users");
		
	}

/*
    --List all user emails - sorted. Design a query to select the email and name column from all users in the users table. Sort by name (descending order).
	SELECT email FROM users	ORDER BY email desc;	
*/
	public function getOrderedUserRows(){
		$conn = $this->getConnection();

		return $conn->query("SELECT email FROM users ORDER BY email desc");
	}
	
/*
    --Check if user exists. Design a query to select the email column from the users table where the email is equal to a given email.
	SELECT email FROM users WHERE email="wesleygruenberg@u.boisestate.edu";
*/
	public function getUserByEmail($email){
		$conn = $this->getConnection();
		
		$query = "SELECT * FROM users WHERE email = :email";
		$stmt = $conn->prepare($query);
		
		$stmt->bindParam(':email', $email);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	}

/*
    --Add user to database. Design a SQL insert statement to insert the user to the users table.
	INSERT INTO users (email, password, name) VALUES('joefaludio@gmail.com', 'wordpass', 'Joey Faludio');
*/
	public function addEmail($email, $password, $name){
		$conn = $this->getConnection();

		$query = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
		
		$stmt = $conn->prepare($query);

		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':name', $name);
		
		$stmt->execute();
	}

/*
    --Retrieve password for a user. Design a query to select the password from the users table for a particular user.
	SELECT password FROM users WHERE email="wesleygruenberg@u.boisestate.edu";
*/
	public function getPassword($email){
		$conn = $this->getConnection();
		
		$query = "SELECT password FROM users WHERE email= :email";
		
		$stmt->bindParam(':email', $email);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
		
		
	}
/*
    --List all users with emails in same domain. Design a query to select the names of all users with emails in the “disney.com” domain. 
	SELECT email FROM users WHERE email LIKE "%disney.com";
*/

	public function getUsersByDomain($domain){
		$conn = $this->getConnection();
		
		$query = "SELECT * FROM users WHERE email LIKE :domain";
		
		$stmt->bindParam(':domain', "%" . $domain);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	
	
	}