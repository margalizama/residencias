<?php

$events = EventData::getEvery();
foreach($events as $event){

	$thejson[] = array("title"=>$event->title,
		"url"=>"./?view=editreservation&id=".$event->id,
		"start"=>$event->date_at."T".$event->time_at,
		"end"=>$event->date_at."T".$event->time_fin,
		"color"=>'#257e4a');
//if(!empty($thejson)) {
//print_r(json_encode($thejson));
//		 }"rendering"=>'background',
}
?>
<script>


	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			nowIndicator:true,
			firstDay: 0,
			lang:'es',
			aspectRatio: 2.45,
			editable: true,
			businessHours: true, // display business hours
			eventLimit: true, // allow "more" link when too many events
			<?php  if(!empty($thejson)) { ?>
			events: <?php echo json_encode($thejson);?>
			<?php } ?>

		});

	});

</script>


<div class="row">
<div class="col-md-12">
<h1>Calendario</h1>
<div id="calendar"></div>

</div>
</div>
