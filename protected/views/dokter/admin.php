<?php
/* @var $this DokterController */
/* @var $model Dokter */

$this->breadcrumbs=array(
	'Dokters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Dokter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dokter-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dokters</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dokter-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		'id',
        'gelar_depan',
		'nama',
        'gelar_belakang',
		'alamat',
		'no_telp',
		'umur',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
