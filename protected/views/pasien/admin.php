<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Pasien', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pasien-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pasiens</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pasien-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		'id',
		'nama',
		'alamat',
		'no_telp',
		'umur',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
