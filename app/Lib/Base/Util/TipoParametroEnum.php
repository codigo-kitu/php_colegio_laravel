<?php declare(strict_types = 1);

namespace App\Lib\Base\Util;

enum TipoParametroEnum {
  case GET;// = "GET",
  case POST;// = "POST",
  case URL;// = "URL",
  case JSON;// = "JSON"
}