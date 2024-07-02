<?php $__env->startSection('konten'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($error); ?> <br/>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
	<?php endif; ?>
    </div>
  </div>

  <div class="card p-3">
        <!-- start tambah jabatan -->


<!-- Resources -->
<script src="<?php echo e(asset('amChart/core.js')); ?>"></script>
<script src="<?php echo e(asset('amChart/chart.js')); ?>"></script>
<script src="<?php echo e(asset('amChart/animated.js')); ?>"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Laki-laki",
  "litres": <?php echo e($lk); ?>

}, {
  "country": "Perempuan",
  "litres": <?php echo e($pr); ?>

}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

}); // end am4core.ready()
</script>



<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv2", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = [
  {
    country: "Menikah",
    litres: <?php echo e($menikah); ?>

  },
  {
    country: "Belum Menikah",
    litres: <?php echo e($bmenikah); ?>

  }
];

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.category = "country";

}); // end am4core.ready()
</script>



<!-- HTML -->
<div class="row">
<div class="col-md-12">
<label><h4>Laki-laki VS Perempuan</h4></label>
<div id="chartdiv"></div>
</div>
 </div>

<div class="row m-2"></div>

 <div class="row mt-4">
 <div class="col-md-12">
<label><h4>Menikah VS Belum Menikah</h4></label>
<div id="chartdiv2"></div>
 </div>
 </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.induk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Simpeg\resources\views/pegawai/grafik.blade.php ENDPATH**/ ?>