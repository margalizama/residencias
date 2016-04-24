    <?php
    $medics = CategoryData::getAll();
    ?>


    
<div class="row">
 <div class="col-md-4">
   <div id="donutcarrera" style="height: 550px;"></div>
   </div>
<div class="col-md-6">
   <div id="graph" style="height: 550px; width: 650px;"></div>
</div>
</div>
<div class="row">
 <div class="col-md-8">
   <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <form class="form-horizontal" role="form" method="post" action="./?action=actionestadistic">
      <button type="submit" class="btn btn-default">Exportar Datos a PDF</button>
      </form>
    </div>
  </div>
</div>


  <script>
  Morris.Donut({
  element: 'donutcarrera',
  data: [
      <?php foreach($medics as $p):?>
         {label:<?php $p->id; $sql = "select * from event where category_id = $p->id"; $pac=EventData::getBySQL($sql); ?> "<?php echo $p->name; ?>", value: <?php echo count($pac); ?>},
      <?php endforeach; ?>  
  ]
  });
  Morris.Bar({
  element: 'graph',
  data: [
  <?php foreach($medics as $p):?>
  <?php 
    $sql = "select * from event where sex = 0 and category_id = $p->id"; 
    $pac=EventData::getBySQL($sql); 
    $sql1 = "select * from event where sex = 1 and category_id = $p->id"; 
    $pac1=EventData::getBySQL($sql1); 
    $a=count($pac);
    $b=count($pac1);
    $c=$a+$b;
  ?>
    {x: '<?php echo $p->description; ?>', y: <?php echo $a ?>, z: <?php echo $b; ?>, a: <?php echo $c; ?>},
   <?php endforeach; ?>  
    
  ],
  xkey: 'x',
  ykeys: ['y', 'z', 'a'],
  labels: ['Hombres', 'Mujeres', 'Total'],
  barColors: ['#0B62A4','#f75b68','#4DA74D','#646464']
  });
  </script>
