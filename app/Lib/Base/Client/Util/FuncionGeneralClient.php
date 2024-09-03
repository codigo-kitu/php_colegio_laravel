<?php declare(strict_types = 1);

namespace App\Lib\Base\Client\Util;

use App\Lib\Base\Util\Constantes;

class FuncionGeneralClient {
    
	public static function GetLabelBoolean(string|bool $value) : string {
        $label='NO';

        if($value==true || $value=='true') {
            $label='SI';
        }

        return $label;
    }

    public static function GetLabelDate(string $value) : string {
        $label='';
        $date1=date($value);
        
        /*
        $month=$date1->getMonth()->toString();
        $day=$date1->getDay()->toString();

        if($date1->getMonth()<10) {
            $month = '0'.$date1->getMonth();
        }

        if($date1->getDay()<10) {
            $day = '0'+$date1->getDay();
        }

        $label = $date1->getFullYear() . '-' . $month . '-' . $day;
        */

        return $label;
    }

    public static function GetLabelTime(string $value) : string{
        $label='';
        $date=date($value);
        
        /*
        $hour=$date->getHours()->toString();
        $minute=$date->getMinutes()->toString();
        $second=$date->getSeconds()->toString();

        if($date->getHours()<10) {
            $hour = '0'.$date->getHours();
        }

        if($date->getMinutes()<10) {
            $minute = '0'.$date->getMinutes();
        }

        if($date->getSeconds()<10) {
            $second = '0'.$date->getSeconds();
        }

        $label = $hour . ':' . $minute . ':' . $second;
        */

        return $label;
    }
}