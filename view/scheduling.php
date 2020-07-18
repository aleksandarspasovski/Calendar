<p>Scheduling page, only for logged users</p>

<div class="sidebar">
	<!-- <h2>Scheduling</h2> -->
	<header>
		<h3>Current year / <?php echo date('M Y'); ?></h3>
		<hr>
	</header>
	<div class="years">
		<ul>
			<li><a href="<?php echo URL; ?>scheduling">Calendar</a></li>
			<li><a href="<?php echo URL; ?>scheduling?list_all">List all</a></li>
			<li><a href="<?php echo URL; ?>scheduling?expired">Expired</a></li>
			<!-- <li><a href=""></a></li> -->
		</ul>
	</div>
</div>

<div class="calendar">
	<?php if (isset($_GET['list_all'])): ?>
		<?php $calendar = new Scheduling();
			$listt = $calendar->listAll();
			var_dump($listt); ?>
	 		<table border="1px" cellpadding="10" cellspacing="0">
		 		<!-- <p><?php echo $key; ?></p> -->
		 		<!-- <p><?php echo $value; ?></p> -->
					<thead>
						<tr class="table">
							<th>id</th>
							<th>content</th>
							<th>day</th>
							<th>user_id</th>
							<th>status</th>
							<th>expiration_date</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					 	<?php foreach ($listt as $value): ?>
							<th><?php echo $value; ?></th>
						<?php endforeach; ?>
					</tbody>
		</table>
	<?php else: ?>
		<table border="1px" cellpadding="10" cellspacing="0" id="table">
			<thead>
				<tr class="table">
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
				</tr>
			</thead>
			<tbody>
				<?php $calendar = new Scheduling();
					echo $calendar->calendar();
				 ?>
			</tbody>

		</table>

	<?php endif; ?>

</div>