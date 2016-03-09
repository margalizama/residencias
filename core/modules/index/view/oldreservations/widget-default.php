<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
<!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->
</div>
		<h1>EVENTOS DE TITULACION CONCLUIDOS</h1>
<br>
		<?php
		
		$users = EventData::getOld();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>TIPO DE TITULACION</th>
			<th>EGRESADO</th>
			<th>JURADO</th>
			<th>FECHA</th>
			<th>OBSERVACIONES</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$project = null;
				if($user->project_id!=null){
				$project  = $user->getProject();
				}
				$pacient  = $user->getAll();
				$pkemon = ContactData::getById($user->presidente);
				$jarvis = ContactData::getById($user->secre);
				$steal = ContactData::getById($user->vocal);
				

				?>

				<tr>
				<td><?php if($project!=null){ echo $project->name; }?></td>
				<td><?php echo $user->title; ?></td>
				<td><?php echo $pkemon->name." <br/> ".$jarvis->name."  <br/>".$steal->name; ?></td>
				<td><?php echo $user->date_at." ".$user->time_at; ?></td>
				<td><input type="text" name="title" value="" required class="form-control" id="inputEmail1" placeholder="observaciones"></td>
				<td style="width:130px;">
				<a href="index.php?view=editreservation&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=delreservation&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay eventos</p>";
		}


		?>


	</div>
</div>