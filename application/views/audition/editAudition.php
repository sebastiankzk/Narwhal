<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">Edit Audition Detail
</h1>
<br/>

<form method="post" action="<?php echo base_url('index.php/audition/update/'); ?>" enctype='multipart/form-data'>
	<input type="hidden" name="auditionid" class="form-control" required="" value="<?php echo $id ?>"</div>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-2">
			<label for="trgDate">Audition Date</label>
		</div>
		<div class="row col-lg-6">
			<input type="date" name="trgDate" class="form-control" placeholder="Audition Date" required="" value="<?php echo $list->date?>"</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-2">
			<label for="trgTime">Audition Time</label>
		</div>
		<div class="row col-lg-6">
			<input type="time" name="trgTime" class="form-control" placeholder="Audition Time" required="" value="<?php echo $list->time?>"</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-6">            
			<input type="submit" name="submit" value="Add" class="btn btn-primary" />   
			<a href="<?php echo base_url('index.php/audition/'.$id); ?>"><input id="btn_cancel" name="btn_cancel" type="button" class="btn btn-danger" value="Cancel" />
		</div>
	</div> 
	<br/>            
</form>