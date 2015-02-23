<?php
/* @var $this RiwayatBerobatController */
/* @var $model RiwayatBerobat */

$this->breadcrumbs=array(
	'Riwayat Berobats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create RiwayatBerobat', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('riwayat-berobat-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Riwayat Berobats</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'riwayat-berobat-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		'id',
		'idDokter.nama',
		'idPasien.nama',
		'idOperator.nama',
		'keluhan',
		'tanggal',
		/*
		'totalBiaya',
		'bayar',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
