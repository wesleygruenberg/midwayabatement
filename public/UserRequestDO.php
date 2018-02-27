<?php
class UserRequestDO
{
	private $id;
	private $user_id;
	private $standing_water;
	private $annoyance;
	private $message;
	private $resolved;
	private $technician_notes;
		
	public function __construct(array $row) {
		$this->id = isset($row['id']) ? $row['id'] : NULL;
		$this->user_id = isset($row['user_id']) ? $row['user_id'] : NULL;
		$this->standing_water = isset($row['standing_water']) ? $row['standing_water'] : NULL;
		$this->annoyance = isset($row['annoyance']) ? $row['annoyance'] : NULL;
		$this->message = isset($row['message']) ? $row['message'] : NULL;
		$this->resolved = isset($row['resolved']) ? $row['resolved'] : NULL;
		$this->technician_notes = isset($row['technician_notes']) ? $row['technician_notes'] : NULL;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setUserId($user_id) {
		$this->user_id = $user_id;
	}
	public function getUserId() {
		return $this->user_id;
	}
	public function setStandingWater($standing_water) {
		$this->standing_water = $standing_water;
	}
	public function getStandingWater() {
		return $this->standing_water;
	}
	public function setAnnoyance($annoyance) {
		$this->annoyance = $annoyance;
	}
	public function getAnnoyance() {
		return $this->annoyance;
	}
	public function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage() {
		return $this->message;
	}
	public function setResolved($resolved) {
		$this->resolved = $resolved;
	}
	public function getResolved() {
		return $this->resolved;
	}
	public function setTechnicianNotes($technician_notes) {
		$this->technician_notes = $technician_notes;
	}
	public function getTechnicianNotes() {
		return $this->technician_notes;
	}
	public function asParamArray() {
		return [':id' => $this->id,
				':user_id' => $this->user_id,
				':standing_water' => $this->standing_water,
				':annoyance' => $this->annoyance,
				':message' => $this->message,
				':resolved' => $this->resolved,
				':technician_notes' => $this->technician_notes];
	}
	
}