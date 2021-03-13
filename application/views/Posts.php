<?php foreach ($posts as $post): ?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->title?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post->author?>&nbsp;&nbsp;&nbsp;<?php echo $post->post_date?></h6>
    <p class="card-text"><?php echo htmlspecialchars($post->message)?></p>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post->tags?></h6>
    <a href="<?php echo URL::site("Posts/Edit")."/".$post->id?>" class="btn btn-success">Edit</a>
    <a href="#" onclick="delConfirm(<?php echo $post->id?>)" class="btn btn-danger">Delete</a>
  </div>
</div>
<br>

<?php endforeach;?>


<a href="<?php echo URL::site("Posts/Add")?>" class="btn btn-primary">New Post</a>


<script type="text/javascript">
function delConfirm(record_id) {
	var confirmMessage = 'Do you really want to delete record #' + record_id;
	if (confirm(confirmMessage)) {
		var delLink = '<?php echo URL::site("Posts/Delete")."/";?>' + record_id;
		window.open(delLink, '_self');
		return false;
	}
	else {
		return false;
	}
}
</script>