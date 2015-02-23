<?php $this->widget( 'ext.EChosen.EChosen' ); ?>

<?php $this->widget( 'ext.EChosen.EChosen', array(
  'target' => '#RiwayatBerobat_containerObat',
  'useJQuery' => true,
  'debug' => true,
)); ?>

<?php
/* @var $this RiwayatBerobatController */
/* @var $model RiwayatBerobat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'riwayat-berobat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dokter'); ?>
        <?php echo $form->dropDownList($model, 
                        'id_dokter',
                        CHtml::listData(Dokter::model()->findAll(), 'id', 'nama'));
        ?>
		<?php echo $form->error($model,'id_dokter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pasien'); ?>
         <?php echo $form->dropDownList($model, 
                        'id_pasien',
                        CHtml::listData(Pasien::model()->findAll(), 'id', 'nama'));
        ?>
		<?php echo $form->error($model,'id_pasien'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keluhan'); ?>
		<?php echo $form->textArea($model,'keluhan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keluhan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalBiaya'); ?>
		<?php echo $form->textField($model,'totalBiaya'); ?>
		<?php echo $form->error($model,'totalBiaya'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bayar'); ?>
		<?php echo $form->textField($model,'bayar'); ?>
		<?php echo $form->error($model,'bayar'); ?>
	</div>
    
     <div class="row">
        <?php echo $form->labelEx($model,'containerObat'); ?>
        <?php 
        
        $selected = array();
        
        if(isset($model->detailBerobats))
        {
            $details = $model->detailBerobats;
            
            foreach($details as $detail)
            {
                $selected[$detail->id_obat] = array('selected' => 'selected');
            }
        }
            
        $htmlOptions = array('multiple' => 'true', 'options' => $selected);

        echo $form->ListBox(
                        $model, 
                        'containerObat',
                        CHtml::listData(Obat::model()->findAll(), 'id', 'nama'),
                        $htmlOptions
                );
        ?>
        <?php echo $form->error($model,'containerObat'); ?>
	</div>
    
    <br/>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<style type="text/css">
    select{
        width:400px;
    }
</style>