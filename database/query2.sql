SELECT * FROM (
			SELECT * FROM guest_requests WHERE resolved = :resolved 
			UNION
			SELECT * FROM user_requests INNER JOIN users ON user_requests.user_id = users.id  WHERE resolved = :resolved 
		) 						
			GROUP BY id 
		ORDER BY req_date DESC;