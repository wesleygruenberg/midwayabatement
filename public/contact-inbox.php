<?php $thisPage = "contact-inbox" ?>
<?php $title = "Contacts Inbox" ?>
<?php include_once "service-request-administration.php" ?>


<?php
$formid = 0;
$dao = new Dao();
$newContacts = $dao->getContactsByResolved(false);
$oldContacts = $dao->getContactsByResolved(true);


?>
<div class="tab-content" id="unresolved-contacts">
    <h2>Unresolved Contacts</h2>
    <a href = "#resolved-contacts">Resolved</a>
		<table class=" contact-table">
<thead>
<tr>
    <th>Date</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Update Notes and Status</th>

</tr>
</thead>
<tbody>

<?php foreach ($newContacts as $newContact) {
    $formid++;
    ?>
    <tr>
        <td><?= htmlspecialchars($newContact['contact_date']) ?></td>
        <td><?= htmlspecialchars($newContact['name']) ?></td>
        <td><?= htmlspecialchars($newContact['email']) ?></td>
        <td><?= htmlspecialchars($newContact['message']) ?></td>
        <td>
            <form id="<?= $formid ?>" method="POST" action="update-contact-handler.php">
                <textarea rows="4" cols="50" name="notes"
                          placeholder="Notes about this customer"><?= htmlspecialchars($newContact['notes']) ?></textarea>
                <div>
                <label class="form-label">Resolved:</label>
                <input form=<?= $formid ?> type="checkbox" name="resolved" value=1
                    <?php if ($newContact['resolved']) { ?>
                        checked
                    <? } ?>
                >
                <input form=<?= $formid ?> type ="hidden" name="id" value="<?= $newContact['id'] ?>">
                <input form=<?= $formid ?> type="hidden" name="page" value="contact-inbox.php">
                <button form=<?= $formid ?> type="submit">Update</button>
                </div>
            </form>
        </td>
    </tr>

<?php } ?>


</tbody>
</table>
    <a href = "#resolved-contacts">Back to top</a>
</div>

<div class="tab-content" id="resolved-contacts">
    <h2>Resolved Contacts</h2>
    <a href = "#unresolved-contacts">Unresolved</a>
		<table class=" contact-table">
<thead>
<tr>
    <th>Date</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Update Notes and Status</th>

</tr>
</thead>
<tbody>

<?php foreach ($oldContacts as $oldContact) {
    $formid++;
    ?>
    <tr>
        <td><?= htmlspecialchars($oldContact['contact_date']) ?></td>
        <td><?= htmlspecialchars($oldContact['name']) ?></td>
        <td><?= htmlspecialchars($oldContact['email']) ?></td>
        <td><?= htmlspecialchars($oldContact['message']) ?></td>
        <td>
            <form id="<?= $formid ?>" method="POST" action="update-contact-handler.php">
                <textarea rows="4" cols="50" name="notes"
                          placeholder="Notes about this customer"><?= htmlspecialchars($oldContact['notes']) ?></textarea>
                <label class="form-label">Resolved:</label>
                <input form=<?= $formid ?> type="checkbox" name="resolved" value=1
                    <?php if ($oldContact['resolved']) { ?>
                        checked
                    <? } ?>
                >
                <input form=<?= $formid ?> type ="hidden" name="req_id" value="<?= $oldContact['id'] ?>">
                <input form=<?= $formid ?> type="hidden" name="page" value="contact-inbox.php">
                <button form=<?= $formid ?> type="submit">Update</button>
            </form>
        </td>
    </tr>

<?php } ?>


</tbody>
</table>
    <a href = "#resolved-contacts">Back to top of Page</a>
    <a href = "#unresolved-contacts">Back to top of Unresolved</a>
</div>


<?php include_once('footer.php'); ?>
