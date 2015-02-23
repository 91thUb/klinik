<?php
/* @var $this RiwayatBerobatController */
/* @var $model RiwayatBerobat */

$this->breadcrumbs=array(
	'Riwayat Berobats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RiwayatBerobat', 'url'=>array('index')),
	array('label'=>'Create RiwayatBerobat', 'url'=>array('create')),
	array('label'=>'Update RiwayatBerobat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RiwayatBerobat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RiwayatBerobat', 'url'=>array('admin')),
);
?>

<h1>View RiwayatBerobat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idDokter.nama',
		'idPasien.nama',
		'idOperator.nama',
		'keluhan',
		'tanggal',
		'totalBiaya',
		'bayar',
	),
)); ?>
