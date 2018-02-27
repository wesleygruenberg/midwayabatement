<?php include_once ('session-handler-functions.php'); 
	session_start();
	require_once ('Dao.php');
	
	
	$userid = $_SESSION['user_id'];
	$dao = new Dao();
	$timestamp = date('Y-m-d G:i:s');
	$newsItems = $dao->getNewsItems();

?>


<?php $title = "NewsFeed";?>
<?php $thisPage = "news-feed";?>
<?php include_once('header.php');?>
<?php include_once('service-request-administration.php'); ?>

	<section id = "contact-us">
		<h5>News Feed Administration</h5>
		
		
		<div class = "column-1" id = "news-feed-form">
		<h4>Add News Items </h4>
			<form id = 0 method="POST" action="news-add-handler.php" autocomplete="off">

				<div class="form-group">
					<textarea required rows="4" cols="50" name="item_body" placeholder= "Your message"><?= $_SESSION['presets']['message'] ?></textarea>
					<?php displayError('message'); ?>
				</div>
				<input form = 0 type="hidden" name="user_id" value="<?=$userid ?>">
				<input form = 0 type="hidden" name="page" value="news-feed.php">
				<div class="form-group">
				<button form = 0 type="submit">Submit</button>
				</div>
		
			</form>
		</div>
		<div class = "column-2" id = "news-feed-list">
			
			<h4>Program updates:</h4>
			<div class="tab-content" id="tab-all">
		<table class="request-table">
		<thead>
			  <tr>
				<th>Date</th>
	
				<th>Edit Item</th>
			
			  </tr>
			  </thead>
			<tbody>
			
			<?php foreach($newsItems as $item) { 
					$formid++;
			?>
			
			<tr>
			
				<td><?= $item['item_date'] ?></td>
							
				<td>
				<form id = "<?=$formid?>" method="POST" action = "news-feed-handler.php">
				<textarea rows="4" cols="50" name="item_body" placeholder= ""><?=htmlspecialchars($item['item_body']) ?></textarea>
				<label class="form-label">DELETE:</label>
				<input form=<?=$formid ?> type="checkbox" name="delete" value=1>
				  <input form=<?=$formid ?> type ="hidden" name="id" value="<?=$item['id'] ?>">
				  <input form=<?=$formid ?> type ="hidden" name="user_id" value="<?=$userid ?>">
				  <input form=<?=$formid ?> type="hidden" name="page" value="news-feed.php">
				  <button form=<?=$formid ?> type="submit">Update</button>
				  </form>
				</td>
			
			</tr>
			
		<?php } ?>
			
			
		
</tbody>
		</table>
	
	</div>
			
			
				
		</div>
	</section>
		


<?php include('footer.php');?>
<?php clearErrors(); ?>