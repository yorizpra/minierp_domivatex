<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'css/bootstrap.css',
        'css/style.css',
        'css/carousel.css',
        'css/style_r.css',
        'css/style_news.css',
        'css/docs.theme.min.css',
        'css/awesome/css/font-awesome.min.css',
        'css/owl.carousel.css',
        'css/owl.theme.default.css',
        'css/balloon.css',
    ];
    public $js = [
        'asset/vendors/jquery.min.js',
        'asset/owlcarousel/owl.carousel.js',
        'js/bootstrap.min.js',
        'js/popper.min.js',
        'js/holder.min.js',
        'js/script_r.js',
        'js/script_news.js',
        'js/jquery.min.js',
//        'js/owl.carousel.min.js',
        'js/owl.carousel.js',
        'js/tooltip.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
