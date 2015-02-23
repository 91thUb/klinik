<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
            $name = isset(Yii::app()->user->userName) ? Yii::app()->user->userName : Yii::app()->user->name;
            
            if(isset(Yii::app()->user->idTypeUser))
            {
                if(Yii::app()->user->idTypeUser == 2)
                {
                    $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Berobat', 'url'=>array('/riwayatBerobat/admin')),
                            array('label'=>'Pasien', 'url'=>array('/pasien/admin')),
                            array('label'=>'Dokter', 'url'=>array('/dokter/admin')),
                            array('label'=>'Operator', 'url'=>array('/operator/admin')),
                            array('label'=>'Obat', 'url'=>array('/obat/admin')),
                            array('label'=>'Suplier', 'url'=>array('/suplier/admin')),
                            array('label'=>'Login', 'url'=>array('/obat/admin'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.$name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),
                    ));
                }
                else if(Yii::app()->user->idTypeUser == 1)
                {
                    $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Berobat', 'url'=>array('/riwayatBerobat/admin')),
                            array('label'=>'Pasien', 'url'=>array('/pasien/admin')),
                            array('label'=>'Login', 'url'=>array('/obat/admin'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.$name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),
                    ));
                }
            }
             else
                {
                    $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Login', 'url'=>array('/obat/admin'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.$name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),
                    ));
                }
         
            ?>
            
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Tugas Basis Data 2013
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
