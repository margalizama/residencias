<?php
$pacients = ProjectData::getAll();
$medics = CategoryData::getAll();
$pkemon = ContactData::getAll();
?>

<div class="row">
<div class="col-md-10">
<h1>Nuevo Evento</h1>
<form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
  <!--
  -->
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
    <div class="col-lg-5">
      <input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
    </div>
    <div class="col-lg-5">
      <input type="time" name="time_at"  class="form-control" id="inputEmail1" placeholder="Hora">
    </div>
  </div>
  <!-- aaaaaaaaaa -->
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo Titulacion</label>
    <div class="col-lg-4">
<select name="project_id" class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Carrera</label>
    <div class="col-lg-4">
<select name="category_id" class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($medics as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
<!--
-->


  <!---->
  <div class="col-lg-10">
   <h4><label for="inputEmail1" class="col-lg-10 control-label">Seleccionar integrantes del jurado</label></h4>
  </div>
   <div class="form-group">
    <div class="col-lg-4">
      <label for="inputEmail1"  class="col-lg-6 text-center control-label">Presidente</label>
    <select name="presidente" class="form-control">
    <option value="">-- Presidente --</option>
      <?php foreach($pkemon as $p):?>
        <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
      <?php endforeach; ?>
    </select>
        </div>
        <div class="col-lg-4">
          <label for="inputEmail1"  class="col-lg-6 text-center control-label">Secretario</label>
    <select name="secre" class="form-control">
    <option value="">-- Secretario --</option>
      <?php foreach($pkemon as $p):?>
        <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
      <?php endforeach; ?>
    </select>
        </div>
        <div class="col-lg-4">
          <label for="inputEmail1"  class="col-lg-6 text-center control-label">Vocal</label>
    <select name="vocal" class="form-control">
    <option value="">-- Vocal --</option>
      <?php foreach($pkemon as $p):?>
        <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
      <?php endforeach; ?>
    </select>
        </div>
      </div>
    <!---->
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Egresado</label>
    <div class="col-lg-6">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="nombres y apellidos">
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Sexo</label>
    <div class="col-lg-4">
    <select name="sex" class="form-control">
    <option value="">-- Seleccione --</option>
    <option value="0">-- MASCULINO --</option>
    <option value="1">-- FEMENINO --</option>
    </select>
    </div>
    </div>
  </div>
  <!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" rows="5" name="description" placeholder="Descripcion"></textarea>
    </div>
  </div>-->
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Evento</button>
    </div>
  </div>
</form>

</div>
</div>
