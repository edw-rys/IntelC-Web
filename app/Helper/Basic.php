<?php
if (! function_exists('convertToCamelCase')) {
    /**
     * Convert to CamelCase
     *
     * @param $string
     * @param string $delimiter
     * @param bool $capitalizeFirstCharacter
     * @return string|string[]
     */
    function convertToCamelCase($string, string $delimiter = '_', bool $capitalizeFirstCharacter = true)
    {
        $str = str_replace($delimiter, '', ucwords($string, $delimiter));

        if (! $capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }
}

if (! function_exists('convert_from_latin1_to_utf8_recursively')) {

    function convert_from_latin1_to_utf8_recursively($dat)
    {
      if (is_string($dat)) {
         return utf8_encode($dat);
      } elseif (is_array($dat)) {
         $ret = [];
         foreach ($dat as $i => $d) $ret[ $i ] = convert_from_latin1_to_utf8_recursively($d);

         return $ret;
      } elseif (is_object($dat)) {
         foreach ($dat as $i => $d) $dat->$i = convert_from_latin1_to_utf8_recursively($d);

         return $dat;
      } else {
         return $dat;
      }
    }
}