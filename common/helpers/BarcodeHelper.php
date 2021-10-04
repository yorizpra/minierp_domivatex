<?php

namespace common\helpers;

use Yii;
use yii\base\Component;

class BarcodeHelper extends Component
{

    public static function generateEAN($number)
    {
      $code = '200' . str_pad($number, 9, '0');
      $weightflag = true;
      $sum = 0;
      // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
      // loop backwards to make the loop length-agnostic. The same basic functionality 
      // will work for codes of different lengths.
      for ($i = strlen($code) - 1; $i >= 0; $i--)
      {
        $sum += (int)$code[$i] * ($weightflag?3:1);
        $weightflag = !$weightflag;
      }
      $code .= (10 - ($sum % 10)) % 10;
      return $code;
    }

}
