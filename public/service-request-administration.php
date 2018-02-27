<?php include_once('header.php');
require_once('Dao.php');
session_start();


 if($_SESSION['admin'] === true ){
	
 }else{
	 
	 header('Location: login.php');
	 die();
 }


?>

			<div class="topnav" id="myTopnav">
				<ul class="tabs">
					<li class="tab-link"<?php if ($thisPage=="serv-req-all") 
					echo " id=\"currentpage\""; ?>><a id="all" href="serv-req-all.php">All Requests</a></li>
					<li class="tab-link"<?php if ($thisPage=="serv-req-unresolved") 
					echo " id=\"currentpage\""; ?>><a id="unresolved" href="serv-req-unresolved.php">Unresolved</a></li>
					<li class="tab-link"<?php if ($thisPage=="serv-req-resolved") 
					echo " id=\"currentpage\""; ?>><a id="resolved" href="serv-req-resolved.php">Resolved</a></li>
					<li class = "tab-link"<?php if ($thisPage =="contact-inbox")
						echo " id=\"currentpage\""; ?>><a id="contact-inbox" href="contact-inbox.php">Contact Inbox
					<li class="tab-link"<?php if ($thisPage=="news-feed")
						echo " id=\"currentpage\""; ?>><a id="news-feed" href="news-feed.php">News Feed</a></li>
					</div></li>
				</ul>
				
			</div>

		</header>
	
	