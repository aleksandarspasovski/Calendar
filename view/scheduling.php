<p>Scheduling page, only for logged users</p>

<div class="sidebar">

	<header>
		<h3>Current year / <?php echo date('M Y'); ?></h3>
		<hr>
	</header>
	
	<div class="years">
		<ul>
			<li><a href="<?php echo URL; ?>scheduling">Calendar</a></li>
			<li><a href="<?php echo URL; ?>scheduling?list_all">List all</a></li>
			<li><a href="<?php echo URL; ?>scheduling?expired">Expired</a></li>
		</ul>
	</div>
</div>

<div class="calendar">
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
				echo $calendar->calendar(); ?>
		</tbody>
	</table>
</div>
