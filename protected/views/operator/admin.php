<?php
/* @var $this OperatorController */
/* @var $model Operator */

$this->breadcrumbs=array(
	'Operators'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Operator', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('operator-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Operators</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'operator-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		'id',
		'nama',
        'user_name',
		'alamat',
		'no_telp',
		'umur',
		'idTypeOperator.nama',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
