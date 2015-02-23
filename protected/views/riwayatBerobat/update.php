<?php
/* @var $this RiwayatBerobatController */
/* @var $model RiwayatBerobat */

$this->breadcrumbs=array(
	'Riwayat Berobats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RiwayatBerobat', 'url'=>array('index')),
	array('label'=>'Create RiwayatBerobat', 'url'=>array('create')),
	array('label'=>'View RiwayatBerobat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RiwayatBerobat', 'url'=>array('admin')),
);
?>

<h1>Update RiwayatBerobat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>