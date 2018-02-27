<?php 

$localhost_cleardb_url = "mysql://b2a06dca9d6203:68404b3b@us-cdbr-iron-east-05.cleardb.net/heroku_655bc7fdbcd20ce?reconnect=true";

if(!getenv("CLEARDB_DATABASE_URL")){
	putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
}
