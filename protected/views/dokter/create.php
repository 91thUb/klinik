<?php
/* @var $this DokterController */
/* @var $model Dokter */

$this->breadcrumbs=array(
	'Dokters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dokter', 'url'=>array('index')),
	array('label'=>'Manage Dokter', 'url'=>array('admin')),
);
?>

<h1>Create Dokter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>