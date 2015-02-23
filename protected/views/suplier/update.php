<?php
/* @var $this SuplierController */
/* @var $model Suplier */

$this->breadcrumbs=array(
	'Supliers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suplier', 'url'=>array('index')),
	array('label'=>'Create Suplier', 'url'=>array('create')),
	array('label'=>'View Suplier', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Suplier', 'url'=>array('admin')),
);
?>

<h1>Update Suplier <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>