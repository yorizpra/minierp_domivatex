<?php

use yii\helpers\Html;
use backend\models\FrontendTopnav;
?>
		<li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false"
                                                  class="nav-link dropdown-toggle">
												  <?=$nav->$labelName?></a>
            <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
                <div class="container">
                    <div class="row bg-white rounded-0 m-0 shadow-sm">
                        <div class="col-sm-12">
                            <div class="p-4">
                                <div class="row">
                                    <?php /*
                                    <div class="col-lg-4 mb-4 nopad mega">
									<?php
										$img = "img/topnav/topnav".$nav->id_frontend_topnav.".jpg";
										if($nav->file_image != ""){
											$img = "img/topnav/".$nav->file_image;
										}
									?>
                                        <ul class="list-unstyled">
                                            <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/<?= $img; ?>"
                                                 alt="" width="257" height="187">
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 mb-4 nopad megajudul">
                                        <h2> <?=$nav->$labelName?> </h2>
                                        <p style="color:#3f3d3d"><?= strip_tags($nav->$labelDesc) ?></p>
                                    </div>
                                    */ ?>

                                    <div class="col-lg-12 mb-12 nopad">
										<ul class="list-unstyled">
									<?php
									$childs = FrontendTopnav::find()
										->andwhere(['id_parent_topnav' => $nav->id_frontend_topnav])
										//->andwhere(['is_expanded' => 1])
										->all();
									foreach($childs as $child){
										echo '<li class="nav-item megacolor">';
                                        echo Html::a(
                                                    $child->$labelName,
                                                    $child->link_url,
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                );
												
										//Fungsi Khusus Untuk Language
										if($child->id_parent_topnav == 10000){
											
											$session = Yii::$app->session;
											if($session->get('lang_id') !== null){
												if($session->get('lang_id') == 1){
													if($child->id_frontend_topnav == 10001){
														echo " &#10004; *selected*";
													}
												}
												if($session->get('lang_id') == 2){
													if($child->id_frontend_topnav == 10002){
														echo " &#10004; *terpilih*";
													}
												}
											}
										}
                                        echo "</li>";
									}
									?>
                                    

									<?php /*
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Company Logo',
                                                    ['/company_logo  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Company Profile',
                                                    ['/company_profile  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Our Location',
                                                    ['/location  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Vission, Mission and Values ',
                                                    ['/vision  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>

                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Group Policy',
                                                    ['/group_policy  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Group Commitment',
                                                    ['/commitment  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
										*/ ?>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </li>