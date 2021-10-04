<?php

use yii\helpers\Html;

?>
<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <?= Html::a(
                'Home',
                ['/'],
                ['data-method' => 'post', 'class' => 'nav-link']
            ) ?>
        </li>

        <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false"
                                                  class="nav-link dropdown-toggle">About Us</a>
            <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
                <div class="container">
                    <div class="row bg-white rounded-0 m-0 shadow-sm">
                        <div class="col-sm-12">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-lg-4 mb-4 nopad mega">
                                        <ul class="list-unstyled">
                                            <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/aboutaus/About.JPG"
                                                 alt="" width="257" height="187">
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 mb-4 nopad megajudul">
                                        <h2> About Us </h2>
                                        <p> Ecogreen Oleochemicals is one
                                            of the leading producers of
                                            Natural Fatty Alcohol in the
                                            world..</p>
                                    </div>

                                    <div class="col-lg-4 mb-4 nopad">
                                        <ul class="list-unstyled">
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
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </li>
        <!-- end of mega -->
        <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false"
                                                  class="nav-link dropdown-toggle">Products</a>
            <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
                <div class="container">
                    <div class="row bg-white rounded-0 m-0 shadow-sm">
                        <div class="col-sm-12">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-lg-4 mb-4 nopad mega">
                                        <ul class="list-unstyled">
                                            <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/products/Products.jpg"
                                                 alt="" width="257" height="187">
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 mb-4 nopad megajudul">
                                        <h2> Our Products </h2>
                                        <p> We are committed to supply
                                            high quality products with
                                            competitive price.</p>
                                    </div>

                                    <div class="col-lg-4 mb-4 nopad">
                                        <ul class="list-unstyled">
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Products',
                                                    ['/product  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Application',
                                                    ['/product  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <!--<li class="nav-item megacolor">
                                                <?= Html::a(
                                                'Refined Glycerin',
                                                ['/product  '],
                                                ['data-method' => 'post', 'class' => 'nav-item']
                                            ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                'Primary Fatty Amine',
                                                ['/product  '],
                                                ['data-method' => 'post', 'class' => 'nav-item']
                                            ) ?>

                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                'Specialty for Lubricant Application',
                                                ['/product  '],
                                                ['data-method' => 'post', 'class' => 'nav-item']
                                            ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                '',
                                                ['/product  '],
                                                ['data-method' => 'post', 'class' => 'nav-item']
                                            ) ?>
                                            </li>-->
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </li> <!-- end of mega -->

        <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false"
                                                  class="nav-link dropdown-toggle">Sustainability</a>
            <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
                <div class="container">
                    <div class="row bg-white rounded-0 m-0 shadow-sm">
                        <div class="col-sm-12">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-lg-4 mb-4 nopad mega">
                                        <ul class="list-unstyled">
                                            <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/Sustainability/Sustainability.jpg"
                                                 alt="" width="257" height="187">
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 mb-4 nopad megajudul">
                                        <h2> Commitment to Sustainability </h2>
                                        <p> We are seeking to minimize the environmental impacts through continual
                                            improvement of our business environmental footprints and respecting human
                                            rights across the supply chain.</p>
                                    </div>

                                    <div class="col-lg-4 mb-4 nopad">
                                        <ul class="list-unstyled">
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Sustainability Commitment',
                                                    ['/sustainability  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Grievance',
                                                    ['/grievance  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Traceability',
                                                    ['/traceability '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Implementation',
                                                    ['/  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>

                                            </li>
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Supplier Assessment',
                                                    ['/supplier '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </li> <!-- end of mega -->
        <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false"
                                                  class="nav-link dropdown-toggle">Career</a>
            <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
                <div class="container">
                    <div class="row bg-white rounded-0 m-0 shadow-sm">
                        <div class="col-sm-12">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-lg-4 mb-4 nopad mega">
                                        <ul class="list-unstyled">
                                            <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/career/career.jpg"
                                                 alt="" width="257" height="187">
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 mb-4 nopad megajudul">
                                        <h2> Career </h2>
                                        <p> We do utmost efforts on discovering and understanding the customer or client
                                            needs.</p>
                                    </div>

                                    <div class="col-lg-4 mb-4 nopad">
                                        <ul class="list-unstyled">
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Career',
                                                    ['/  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </li> <!-- end of mega -->
        <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false"
                                                  class="nav-link dropdown-toggle">Contact Us</a>
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
                                        <h2> Contact Us </h2>
                                        <p> We do utmost efforts on discovering and understanding the customer or client
                                            needs.</p>
                                    </div>

                                    <div class="col-lg-4 mb-4 nopad">
                                        <ul class="list-unstyled">
                                            <li class="nav-item megacolor">
                                                <?= Html::a(
                                                    'Contact Us',
                                                    ['/contact  '],
                                                    ['data-method' => 'post', 'class' => 'nav-item']
                                                ) ?>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </li> 
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
		
		<!-- end of mega -->
		
    </ul>
</div>
