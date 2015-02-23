<?php
/* @var $this RiwayatBerobatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Riwayat Berobats',
);

$this->menu=array(
	array('label'=>'Create RiwayatBerobat', 'url'=>array('create')),
	array('label'=>'Manage RiwayatBerobat', 'url'=>array('admin')),
);
?>

<h1>Riwayat Berobats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
