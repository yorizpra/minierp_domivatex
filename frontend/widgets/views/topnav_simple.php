<?php

use yii\helpers\Html;
use backend\models\FrontendTopnav;
?>
<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto">
		<?php /*
        <li class="nav-item active">
            <?= Html::a(
                'Home',
                ['/'],
                ['data-method' => 'post', 'class' => 'nav-link']
            ) ?>
        </li>
		*/ ?>
		
		<?php
		$session = Yii::$app->session;		
		if($session->get('lang_id') !== null){
			$lang_id = $session->get('lang_id');
		}else{
			$lang_id = 1;
		}
		
		$topnavs = FrontendTopnav::find()
			->andwhere(['id_parent_topnav' => 0])
			//->andwhere(['is_expanded' => 1])
			->all();
			foreach($topnavs as $nav){
				$labelName = "menu_name_lang".$lang_id;
				$labelDesc = "description_lang".$lang_id;
				if($nav->is_expanded == 0){
					//single
					echo '
					<li class="nav-item active">';
					echo Html::a(
						$nav->$labelName,
						['/'],
						['data-method' => 'post', 'class' => 'nav-link']
					);
					echo '</li>
					';
				}else{
					echo $this->render('_sub_menu_topnav_simple', [
							'nav' => $nav,
							'labelName' => $labelName,
							'labelDesc' => $labelDesc,
						]);
				}
			}
		?>

		<?php /*
        <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false"
                                                  class="nav-link dropdown-toggle">Language</a>
            <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
                <div class="container">
                    <div class="row bg-white rounded-0 m-0 shadow-sm">
                        <div class="col-sm-12">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-lg-4 mb-4 nopad mega">
                                        <ul class="list-unstyled">
                                            <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/contact/Contact.jpg"
                                                 alt="" width="257" height="187">
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 mb-4 nopad megajudul">
                                        <h2> Language </h2>
                                        <p> Choose our web language.</p>
                                    </div>

                                    <div class="col-lg-4 mb-4 nopad">
                                        <ul class="list-unstyled">
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'English',
                                                    ['/site/index','lang'=>'en'],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
												
												<?php
												$session = Yii::$app->session;
												if($session->get('lang_id') !== null){
													if($session->get('lang_id') == 1){
														echo " *selected*";
													}
												}
												?>

                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Indonesia',
                                                    ['/site/index','lang'=>'id'],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
												<?php
												$session = Yii::$app->session;
												if($session->get('lang_id') !== null){
													if($session->get('lang_id') == 2){
														echo " *terpilih*";
													}
												}
												?>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </li> <!-- end of mega -->
		*/ ?>
		
		<!-- end of mega -->
		
    </ul>
</div>
