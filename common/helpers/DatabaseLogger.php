<?php

namespace common\helpers;

use Yii;
use yii\base\Component;
use common\helpers\Timeanddate;
use common\helpers\IPAddressFunction;

class DatabaseLogger extends Component {

    public static function setWriteUserKontak($model)
    {
		$model->inputdate = Timeanddate::getCurrentDateTime();
		$model->userid = IPAddressFunction::getUserIPAddress(); //Sementara karena tidak punya tempat ditaruh dulu di userid
		//echo $model->inputdate." ".$model->userid;
		return $model;
    }

}
