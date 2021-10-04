<?php

use frontend\assets\AppAsset;
use backend\models\ContentSearch;
use backend\models\OfficeRegion;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = ContentSearch::findTitle( 'Contact Us');
AppAsset::register($this);
//$js = <<<JS
//   $(window).load(function () {
//       $(".se-pre-con").fadeOut("slow");
//       ;
// });
//JS;
//$this->registerJs($js);
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<script>
    $(window).load(function () {
        $(".se-pre-con").fadeOut("slow");
        ;
    });
</script>
	<?php	
	echo $this->render('banner/_mainbanner', ['no_active_banner'=>5]);
	?>
<?php /*
<div class="container-fluid banner" style="padding:0px; position: relative;">
    <!--        <div class="se-pre-con"></div>-->
    <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/banner/profile.jpg" class="banner">
    <div class="leftmenu bottom-left">
        &nbsp &nbsp &nbsp <?= $this->title ?> &nbsp &nbsp &nbsp
    </div>
</div><!-- /.container -->
*/ ?>
<div class="container">
		<?php if (Yii::$app->session->hasFlash('success')) { ?>
			<br>
            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>
        <?php } ?>
    <div class="row">

		<?php
			$session = Yii::$app->session;		
			$lang_id = $session->get('lang_id');
			$lang_id = $lang_id*1;
			if($lang_id <= 0) {$lang_id = 1;}
			
			$field_address = "office_region_address_lang".$lang_id;
			
			$offices = OfficeRegion::find()->all();
			foreach($offices as $office){
				
		?>
			<div class="col-md-6">
				<div class="addres">
					<p class="addres">
						<span style="font-weight: bold">
						<?= $office->office_region ?></span><br>
						<?= $office->$field_address ?>
						<br>
						Email :
						<a href="mailto:<?= $office->email_contact ?>?subject = Feedback&body = Message">
							<?= $office->email_contact ?></a>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="artContentSided">
					<iframe scrolling="no" marginheight="0" marginwidth="0"
							src="<?= $office->maps_api ?>"
							frameborder="0" style="width:100%; min-height: 300px; margin-top: 20px;"></iframe>
					<br>
					<small>View <a
								href="<?= $office->maps_api ?>"
								style="color:#0000FF;text-align:left"><?= $office->office_region ?></a> in a
						larger map
					</small>
				</div>
			</div>
		<?php
			}
		?>
		
		
		<?php /*
        <div class="col-md-6">
            <div class="addres">
                <p class="addres">
                    <span style="font-weight: bold">Marketing Office & Asia Pacific Regional Office</span><br>
                    ECOGREEN OLEOCHEMICALS (SINGAPORE) PTE LTD <br>
                    99 Bukit Timah Road # 04-01 Alfa Centre <br>
                    Singapore - 229835 <br>
                    Tel : (65) 633 777 26 <br>
                    Fax : (65) 633 777 06 <br>
                    Email :<a href="mailto:info@ecogreenoleo.com?subject = Feedback&body = Message">
                        info@ecogreenoleo.com</a>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="artContentSided">
                <iframe scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;output=embed"
                        frameborder="0" style="width:100%; min-height: 300px; margin-top: 20px;"></iframe>
                <br>
                <small>View <a
                            href="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;source=embed"
                            style="color:#0000FF;text-align:left">Ecogreen Oleochemicals (Singapore) Pte Ltd</a> in a
                    larger map
                </small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="addres">
                <p class="addres">
                    <span style="font-weight: bold">Europe, Middle East and Africa Regional Office</span><br>
                    Ecogreen Oleochemicals GmbH<br>
                    D-06861 Dessau-Roβlau, Brambacher Weg 1, Germany <br>
                    Tel : (49) 34901 548466 <br>
                    Fax : : (49) 34901 548470 <br>
                    Email :<a href="mailto:info@ecogreenoleo.de?subject = Feedback&body = Message">
                        info@ecogreenoleo.de</a>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="artContentSided">
                <iframe scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;output=embed"
                        frameborder="0" style="width:100%; min-height: 300px; margin-top: 20px;"></iframe>
                <br>
                <small>View <a
                            href="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;source=embed"
                            style="color:#0000FF;text-align:left">Ecogreen Oleochemicals (Singapore) Pte Ltd</a> in a
                    larger map
                </small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="addres">
                <p class="addres">
                    <span style="font-weight: bold">USA and Latin America Regional Offices</span><br>
                    Ecogreen Oleochemicals Inc.<br>
                    2825 Wilcrest Drive, Suite 418, Houston Texas, USA – 77042<br>
                    Tel : (1-713) 787 5449<br>
                    Fax : : (1-713) 787 0633 <br>
                    Email :<a href="mailto:info@ecogreenoleo.com?subject = Feedback&body = Message">
                        info@ecogreenoleo.com</a>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="artContentSided">
                <iframe scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;output=embed"
                        frameborder="0" style="width:100%; min-height: 300px; margin-top: 20px;"></iframe>
                <br>
                <small>View <a
                            href="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;source=embed"
                            style="color:#0000FF;text-align:left">Ecogreen Oleochemicals (Singapore) Pte Ltd</a> in a
                    larger map
                </small>
            </div>
        </div>
		*/ 
		?>

    </div> <!-- row -->
</div><!-- /.container -->
<div class="container contact-form">
	<?= $this->render('contact/_form', [
		'model' => $model,
	]) ?>
</div>
