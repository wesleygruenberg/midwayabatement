    --Wesley Gruenberg In-Class activity
	
	--List all user emails. Design a query to select the email column from all users in the users table.
	SELECT email FROM users;

    --List all user emails - sorted. Design a query to select the email and name column from all users in the users table. Sort by name (descending order).
	SELECT email FROM users	ORDER BY email desc;

    --Check if user exists. Design a query to select the email column from the users table where the email is equal to a given email.
	SELECT email FROM users WHERE email="wesleygruenberg@u.boisestate.edu";
	
    --What will the query return if the user does exist? 
		--ANSWER: If user exists it will return that row value for email. 
	--What will it return if the user does not exist?
		--ANSWER: If the user does not exist the query will return an empty set. 
	--How will you use this in your code to notify the user if the account already exists?
		--ANSWER: If we return any value that is not null (empty) then we can allow the user to use the email they chose.

    --Add user to database. Design a SQL insert statement to insert the user to the users table.
	INSERT INTO users (email, password, name) VALUES('joefaludio@gmail.com', 'wordpass', 'Joey Faludio');

    --What will the statement return if the user is successfully added?
		--ANSWER: Query OK: 1 row affected (1.58 sec) 
	--What will it return if something goes wrong? 
		--ANSWER: If I try to insert again I get ERROR 1062 (23000): Duplicate entry 'JoeFaludio@gmail.com' for key 
				--'email' since I already have an entry with this unique email value.
	--How will you use this to give feedback to your user?
		--ANSWER: In this case, the email is already taken and they will have to use another to register. We could 
				--also see if maybe they forgot they had an account and want to reset their password.
   
    --Retrieve password for a user. Design a query to select the password from the users table for a particular user.
	SELECT password FROM users WHERE email="wesleygruenberg@u.boisestate.edu";
	
    --List all users with emails in same domain. Design a query to select the names of all users with emails in the “disney.com” domain. 
	SELECT email FROM users WHERE email LIKE "%disney.com";
	
	