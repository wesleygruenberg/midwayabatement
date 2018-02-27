<?php
require_once("../database/config.php");

class Dao
{
    /**
     * Creates and returns a PDO connection using the database connection
     * url specified in the CLEARDB_DATABASE_URL environment variable.
     */
    public function getConnection()
    {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $host = $url["host"];
        $db = substr($url["path"], 1);
        $user = $url["user"];
        $pass = $url["pass"];

        $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

        // Turn on exceptions for debugging. Comment this out for
        // production or make sure to use try-catch statements.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    /**
     * Returns the database connection status string.
     */
    public function getConnectionStatus()
    {
        $conn = $this->getConnection();
        return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
    }

    /**
     * Validate an existing user
     */
    public function validateUser($email, $password)
    {

        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT password FROM users
													WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch();

        $digest = $row['password'];

        return password_verify($password, $digest);
    }

    public function getUserName($email)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT name FROM users
													WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch();

        $name = $row['name'];

        return $name;

    }

    public function getUserId($email)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT id FROM users
													WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch();

        $userid = $row['id'];

        return $userid;
    }

    public function isAdmin($email)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT administrator FROM users
													WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch();

        $admin = $row['administrator'];

        return $admin;
    }

    public function submitUserRequest($userid, $annoyance, $standingwater, $message, $req_date)
    {
        $conn = $this->getConnection();
        $query = "INSERT INTO user_requests (user_id, annoyance, standing_water, message, req_date) VALUES (:user_id, :annoyance, :standing_water, :message, :req_date)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $userid);
        $stmt->bindParam(':annoyance', $annoyance);
        $stmt->bindParam(':standing_water', $standingwater);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':req_date', $req_date);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }
    }

    public function submitGuestRequest($name, $email, $address, $city, $phone, $annoyance, $standingwater, $message, $req_date)
    {

        $conn = $this->getConnection();
        $query = "INSERT INTO guest_requests (name, email, address, city, phone, annoyance, standing_water, message, req_date) 
		VALUES (:name, :email, :address, :city, :phone, :annoyance, :standing_water, :message, :req_date)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':annoyance', $annoyance);
        $stmt->bindParam(':standing_water', $standingwater);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':req_date', $req_date);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }
    }

    public function getUserRequests($resolved)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT *
															
									FROM user_requests JOIN users ON user_requests.user_id = users.id WHERE resolved = :resolved ORDER BY req_date DESC");
        $stmt->bindParam(':resolved', $resolved);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public function getGuestRequests($resolved)
    {
        $conn = $this->getConnection();
        //return $conn->query("SELECT * FROM guest_requests WHERE resolved = \"true\"");

        $stmt = $conn->prepare("SELECT * FROM guest_requests WHERE resolved = :resolved ORDER BY req_date DESC");
        $stmt->bindParam(':resolved', $resolved);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllUserRequests()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM user_requests INNER JOIN users ON user_requests.user_id = users.id ORDER BY req_date DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public function getAllGuestRequests()
    {
        $conn = $this->getConnection();


        $stmt = $conn->prepare("SELECT * FROM guest_requests ORDER BY req_date DESC");


        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function updateUserRequests($id, $notes, $resolved)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE user_requests SET resolved = :resolved,
														technician_notes = :notes 
														WHERE req_id = :id");
        $stmt->bindParam(':resolved', $resolved);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':notes', $notes);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }

    }

    public function updateGuestRequests($id, $notes, $resolved)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE guest_requests SET resolved = :resolved,
														technician_notes = :notes 
														WHERE req_id = :id");
        $stmt->bindParam(':resolved', $resolved);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':notes', $notes);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }


    }

    public function getNewsItems()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM news_items  ORDER BY item_date DESC LIMIT 15");


        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteNewsItem($id)
    {

        $conn = $this->getConnection();
        $stmt = $conn->prepare("DELETE FROM news_items WHERE id = :id");

        $stmt->bindParam(':id', $id);


        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }

    }

    public function updateNewsItem($id, $item_body)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE news_items SET item_body = :item_body WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':item_body', $item_body);


        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }


    }

    public function addNewsItem($item_date, $item_body, $user_id)
    {
        $conn = $this->getConnection();
        //
        $query = "INSERT INTO news_items (item_date, item_body, user_id) VALUES (:item_date, :item_body, :user_id)";
        $stmt = $conn->prepare($query);
        var_dump($item_date, $item_body, $user_id);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':item_body', $item_body);
        $stmt->bindParam(':item_date', $item_date);


        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }


    }

    public function getContactsByResolved($resolved)
    {
        $conn = $this->getConnection();
        $query = "SELECT * FROM contacts WHERE resolved = :resolved ORDER BY contact_date DESC";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':resolved', $resolved);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public function updateContact($id, $resolved, $notes)
    {
        $conn = $this->getConnection();
        $query = "UPDATE contacts SET resolved = :resolved, notes = :notes WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':resolved', $resolved);
        $stmt->bindParam(':notes', $notes);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo($e->getMessage());
            return false;
        }
    }


}
