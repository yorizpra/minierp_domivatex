<?php
use backend\models\ContentSearch;
use yii\helpers\Url;
use common\helpers\ContentStringManipulator;

$this->title = $page->title ;

?>
<style>
h1 {
	padding-top:20px;
    font-size: 1.8rem;
}

.mb50 {
    margin-top: 30px;
    margin-bottom: 50px;
}
</style>
<main role="main">
	<?php	
	if($page->with_banner == 1){
		echo $this->render('banner/_mainbanner', ['no_active_banner'=>1]);
	}
	?>
	<?php
    $session = Yii::$app->session;		
	$lang_id = $session->get('lang_id');
	$lang_id = $lang_id*1;
	if($lang_id <= 0) {$lang_id = 1;}
	$fieldtitle = "title_lang".$lang_id;
	$fiedlcontent = "content_lang".$lang_id;
	?>
	<br>
    <div class="container-fluid mb50">
		<?php 
		//echo $page->$fiedlcontent;
		/*
        <div class="row">
            <div class="col-md-12">
				<h1><?= $page->$fieldtitle ?></h1>
				<hr>
			</div>
		</div>
		*/ ?>
		

        <div class="row">
	
            <div class="col-md-12" style="border: 1px solid #c3c3c3;border-radius: 5px;">
				<?php echo $page->$fiedlcontent ?> 
				
			</div>
			
        </div>
			
	</div>
	<hr>
</main>

