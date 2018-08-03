<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">Auditions on: <?php echo $details->date ?>
</h1>
<br/>

<div class="row">
	<?php if(!empty($list)): ?>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Student Name</th>
				<th>mobile</th>
				<th>Status</th>
				<th> </th>
				<th> </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($list as $row): ?>
				<?php $index = 1; foreach ($list as $row):?>
					<tr>
						<td><?=$index++?></td>
						<td><?=$row['name']?></td>
						<td><?=$row['mobile']?></td>
						<td><?=$row['status']?></td>
						<td><a href="<?php echo base_url('index.php/audition/passAttendee/'.$row['id']); ?>">Pass</a></td>
						<td><a href="<?php echo base_url('index.php/audition/failAttendee/'.$row['id']); ?>">Fail</a></td>
					</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
		There are no Auditions Attendees for this Timeslot
	<?php endif ?>
</div>


