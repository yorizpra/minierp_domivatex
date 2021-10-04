<?php
use backend\models\MenuLink;
use backend\models\MediaIdentity;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<style>
.foot {
    background-color: #3c6101;
    padding: 20px;
    color: #fff;
}
</style>
<footer class="foot">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="img/logo.png" style="width: 100%;">
                <p style="color: #fff; text-align: left">ECOGREEN OLEOCHEMICALS
                    (SINGAPORE) PTE LTD</p>
			</div>
			<div class="col-md-3">
                <ul class="list-unstyled subfooter" style="margin:0px;">
                    <li> 99 Bukti Timah Road #04-01 Alfa Centre</li>
                    <li> Singapore-229835</li>
                    <li> Tel : (65) 663 777 26</li>
                    <li> Fax : (65) 663 777 06</li>
                    <li> info@ecogreenoleo.com</li>
                </ul>
            </div>


            <!-- <div class="col-md-3">
                <h5 class="headfooter"> Customer Service </h5>
                <ul class="list-unstyled subfooter" style="margin:0px;">
                    <li><?= Html::a(
                'Contact Us',
                ['/contact  '],
                ['data-method' => 'post', 'class' => 'nav-item']
            ) ?></li>
                    <li> Ordering & Payments</li>
                    <li> Shipping</li>
                    <li> Returns</li>
                    <li> FAQ</li>

                </ul>
            </div>-->



            <div class="col-md-3">
            
                <ul class="list-unstyled subfooter" style="margin:0px;">
					<?php
					$menus = MenuLink::find()
						->all();
						
					$session = Yii::$app->session;
					$lang_id = $session->get('lang_id');
					$lang_id = $lang_id*1;
					if($lang_id <= 0) {$lang_id = 1;}
					$field = "menu_name_lang".$lang_id;
					foreach($menus as $menu){
						$title = $menu->$field;
						if($title == ""){$title = "Not-Set";}
						echo '
							<li style="text-decoration: none;">
							<span style="color:#1c5630"><a href="'.$menu->url.'"><b>'.$title.'</b></a>
							</span>
							</li>
						';
					}
					?>
					
					<?php /*
                    <li><a href=""> Home </a></li>
                    <li> About Us</li>
                    <li> Products</li>
                    <li> Sustainability</li>
                    <li> Career</li>
					<li> Contact Us</li>
					*/
					?>
                </ul>
            </div>
			
			<div class="col-md-3">
				<div class="social-old">
					<!--<a href="" class="socialicon"> <i class="fa fa-twitter "></i> </a>
					<a href="" class="socialicon"> <i class="fa fa-instagram "></i> </a>-->
					<?php
						$medias = MediaIdentity::find()
							->all();
						foreach($medias as $media){
							echo '
							<a href="'.$media->url.'" class="socialicon"> <i class="'.$media->icon.'"></i> </a>
							';
						}
					?>
					<?php /*
					<a href="" class="socialicon"> <i class="fa fa-facebook"></i> </a>
					<a href="" class="socialicon"> <i class="fa fa-linkedin-square "></i> </a>
					*/ ?>
					
					<p style="color:#fff; margin-top: 75px;">&copy; <?= Html::encode(Yii::$app->params['nameCompany']) ?></p>
				</div>				
            </div>

           
        </div>
    </div>


</footer>

