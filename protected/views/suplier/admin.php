<?php
/* @var $this SuplierController */
/* @var $model Suplier */

$this->breadcrumbs=array(
	'Supliers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Suplier', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('suplier-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Supliers</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suplier-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		'id',
		'nama_supplier',
		'alamat',
		'no_telp',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
