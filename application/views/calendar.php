<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Calendar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container-fluid">
		<h1 class="text-center text-primary">Calender</h1>
		<div class="row" id="navigation">
			<div class="col-sm-6">
				<a class="btn btn-outline-primary float-left" role="button" href="/?start_date=<?php echo $previousWeekStart; ?>">< Previous Week</a>
			</div>
			<div class="col-sm-6">
				<a class="float-right btn btn-outline-primary" role="button" href="/?start_date=<?php echo $nextWeekStart; ?>">Next Week ></a>
			</div>
		</div>
		<div class="row seven-cols">
			<?php
			foreach ($events as $date => $data) {?>
				<div class="col-md-1">
					<div class="col-header text-center">
						<span><?php echo date('D', strtotime($date));?></span>
						<span><?php echo date('m/d', strtotime($date));?></span>
					</div>
					<?php if (is_array($data)) {
						 foreach ($data as $event) { ?>
							 <div class="event-block">
								<span data-toggle="tooltip" data-placement="top"
									  title="<?php echo $event->event_description; ?>" class="text-primary event-name">
									<?php echo $event->event_name; ?>
								</span>
								 <span><?php echo $event->event_instructor; ?></span>
								 <span><?php echo date('g:i a', strtotime($event->start_time)); ?></span>
								 <span><?php echo $event->total_minutes; ?> min</span>
							 </div>
							 <?php
						 }
					}
				echo '</div>';
			}

			?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</div>
</body>
</html>
