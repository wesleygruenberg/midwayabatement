	 
	 <?php
	 $dao = new Dao();
	 $urequests = $dao->getUserRequests(true);
	 $guest_requests = $dao->getGuestRequests(true);
	 $requests = array_merge($urequests, $guest_requests);
	 function sortFunction( $a, $b ) {
		return strtotime($b["req_date"]) - strtotime($a["req_date"]);
		}
	usort($requests, "sortFunction");
	 //$requests = $dao->getAllRequests(true);
	 
	 ?>
	 
<div class="tab-content" id="tab-all">
    <h2>Resolved Service Requests</h2>
		<table class="request-table">
		<thead>
			  <tr>
				<th>Date</th>
				<th>Name</th>
				<th>Location</th>
				<th>Phone</th>
				<th>Description</th>
				<th>Standing Water</th>
				<th>Night Spray</th>
				<th>Update</th>
			
			  </tr>
			  </thead>
			<tbody>
			
			<?php foreach($requests as $urequest) { 
					$formid++;
			?>
			
			<tr>
			
				<td><?= $urequest['req_date'] ?></td>
				<td><?= $urequest['name'] ?></td>
				<td><?= $urequest['address'] ?><br><br>
						<?= $urequest['city'] ?>
						</td>
				<td><?=$urequest['phone']?></td>
				<td><?= $urequest['message'] ?></td>
			<td>
				<?php if ( $urequest['standing_water']) { ?>
					 &#x2714;
				<? } ?>
				</td>
				<td>
				<?php if ( $urequest['annoyance']) { ?>
					 &#x2714;
				<? } ?>
				</td>
				
				
				<td>
				<form id = "<?=$formid?>" method="POST" action = "update-req-handler.php">
				<textarea rows="4" cols="50" name="notes" placeholder= "Technician Notes"><?= $urequest['technician_notes'] ?></textarea>
				<label class="form-label">Resolved:</label>
				<input form=<?=$formid ?> type="checkbox" name="resolved" value=1 
				<?php if ( $urequest['resolved']) { ?>
					checked
				<? } ?>
				>
				
				
				  <input form=<?=$formid ?> type ="hidden" name="req_id" value="<?=$urequest['req_id'] ?>">
				  <input form=<?=$formid ?> type="hidden" name="user_id" value="<?=$urequest['user_id'] ?>">
				  <input form=<?=$formid ?> type="hidden" name="page" value="serv-req-resolved.php">
				  <button form=<?=$formid ?> type="submit">Update</button>
				  </form>
				</td>
			
			</tr>
			
		<?php } ?>
			
			
		
</tbody>
		</table>
	
	</div>
	