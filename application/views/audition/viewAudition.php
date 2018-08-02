<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">Auditions dates: <?php echo $cca->name ?>
</h1>
<br/>

<a href="<?php echo base_url('index.php/audition/add/'.$CCAID); ?>" class="btn btn-primary">Add Auditions</a>

<?php if(!empty($list)): ?>
	<?php foreach($list as $row): ?>
		<div class="card mb-4">
			<div class="card-body" style="background: #F8F8F8;">
				<div class="row">
					<div class="col-lg-10">
						<p class="card-text">Auditions Date: <?php echo $row['date']; ?></p>
						<p class="card-text">Auditions Time: <?php echo date(" h:i A", strtotime($row['time'])); ?></p>
						<p class="card-text">Auditions Status: <?php echo $row['status']; ?></p>
					</div>
					<div class="col-lg-2">
						<?php if($this->session->userdata('role') == 'Leader'): ?>
							<a href="<?php echo base_url('index.php/audition/edit/'.$row['id']); ?>" class="btn btn-primary">Edit</a>
							<a href="<?php echo base_url('index.php/audition/auditionAttendees/'.$row['id']); ?>" class="btn btn-primary">View</a>
						<?php else: ?>
							<a href="<?php echo base_url('index.php/audition/addAudition/'.$row['id']); ?>" class="btn btn-primary">Apply</a>
						<?php endif?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php else: ?>

	There are no Auditions for this CCA, Only add if your CCA needs to Hold auditions.

<?php endif ?>