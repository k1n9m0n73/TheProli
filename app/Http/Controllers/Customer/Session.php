<?php
namespace App\Http\Controllers\Customer;
trait  Session
{ 
	   	
public function exists($name){
	return (isset($_SESSION[$name])) ? true : false;
}
public function allSession(){
	return $_SESSION ;
}

public  function get($name){
	return $this->exists($name)? $_SESSION[$name]:null;  
}
public function put($name, $value){
	return $_SESSION[$name] = $value;
} 
public  function delete($name){
	if($this->exists($name)){
		unset($_SESSION[$name]);
	}
}

public  function empty_session($name){
	if($this->exists($name)){
		$this->put($name,[]);
	}
}
public  function flash($name, $string = ''){
	if ($this->exists($name)){
		$session = $this->get($name);
		$this->delete($name);
		return $session;
	}else{
		$this->put($name, $string);
	}
}
}


