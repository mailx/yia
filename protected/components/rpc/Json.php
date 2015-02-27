<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//namespace vsapi2\components;

interface JsonSerializable {
    public function jsonSerialize();
}

class Json {
    public static function encode( $data ) {
        if( is_array($data) && is_int(key($data)) ) {
            return '[' . self::implode($data, ',', function( $value, $key ) {
                unset ($key);
                return Json::encode($value);
            }) . ']';
        }
        elseif( is_array($data) ) {
            return '{' . self::implode($data, ',', function( $value, $key ) {
                return Json::encode((string)$key) .  ':' . Json::encode($value);
            }) . '}';
        }
        elseif( is_object($data) ) {
            return $data instanceof JsonSerializable 
                ? self::encode($data->jsonSerialize())
                : self::encode(get_object_vars($data));
        }
        else {
            return json_encode($data);
        }
    }
    
    public static function implode(array $arr, $delimiter=',', $callback=null ) {
        $callback   = $callback ?: function($value,$key) { return $value; };
        $result     = '';
        foreach( $arr AS $key => $value ) {
            $result .= (empty($result) ? '' : $delimiter) . $callback($value, $key);
        }
        return $result;
    }
}
