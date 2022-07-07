<?php

namespace  Module;

class Escape{

public  static function done($string){
    if (gettype($string) =='string') {
    	return htmlentities($string, ENT_QUOTES, 'UTF-8');	# code...
    }else{
    	return $string;
    }

}

public  static function reverse($string){
    return html_entity_decode($string, ENT_QUOTES, 'UTF-8');
}


}