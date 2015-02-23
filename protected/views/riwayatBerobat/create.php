<?php
/* @var $this RiwayatBerobatController */
/* @var $model RiwayatBerobat */

$this->breadcrumbs=array(
	'Riwayat Berobats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RiwayatBerobat', 'url'=>array('index')),
	array('label'=>'Manage RiwayatBerobat', 'url'=>array('admin')),
);
?>

<h1>Create RiwayatBerobat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>