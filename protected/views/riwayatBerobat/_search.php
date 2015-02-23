<?php
/* @var $this RiwayatBerobatController */
/* @var $model RiwayatBerobat */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_dokter'); ?>
		<?php echo $form->dropDownList($model, 
                        'id_dokter',
                        CHtml::listData(Dokter::model()->findAll(), 'id', 'nama'));
        ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pasien'); ?>
		<?php echo $form->dropDownList($model, 
                        'id_pasien',
                        CHtml::listData(Dokter::model()->findAll(), 'id', 'nama'));
        ?>
	</div>
    
    <?php if(Yii::app()->user->idTypeUser == 2): ?> 
        <div class="row">
            <?php echo $form->label($model,'id_operator'); ?>
            <?php echo $form->dropDownList($model, 
                            'id_operator',
                            CHtml::listData(Dokter::model()->findAll(), 'id', 'nama'));
            ?>
        </div>
    <?php endif; ?>

	<div class="row">
		<?php echo $form->label($model,'keluhan'); ?>
		<?php echo $form->textArea($model,'keluhan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->