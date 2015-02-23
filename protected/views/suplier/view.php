<?php
/* @var $this SuplierController */
/* @var $model Suplier */

$this->breadcrumbs=array(
	'Supliers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Suplier', 'url'=>array('index')),
	array('label'=>'Create Suplier', 'url'=>array('create')),
	array('label'=>'Update Suplier', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Suplier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suplier', 'url'=>array('admin')),
);
?>

<h1>View Suplier #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama_supplier',
		'alamat',
		'no_telp',
	),
)); ?>
