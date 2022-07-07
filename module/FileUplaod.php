<?php

namespace  Module;

class FileUplaod{


public  static function upload($req,$tagName,$size,$rename=true,$path=''){
    $imgErrName = $req->file($tagName)->getClientOriginalName();
    if(empty($req->file($tagName)->getClientOriginalName()) ){
        return ['err'=>'File name is empty'];
        exit();
    }

    $alex = array('jpeg','jpg','png','gif','docs','xlsx','xlx','docx','txt','pdf','mp4','mp3','ogg','avi','mpeg');
    if(! in_array($req->file($tagName)->guessClientExtension(),$alex) ){
        return ['err'=>'File name is empty'];
        exit();
    }

    if($req->file($tagName)->getSize() > $size ){
        return ['err'=>$imgErrName.' File size is more than  ' .($size/1000000).'Mb'];
        exit();
    }
     $rn  =  $req->file($tagName)->getClientOriginalName();
    if($rename){
     $rn = substr(str_shuffle('abcdfgrutko123456790qweiomdidnc092939239nsddhbd2ASWERTYUIOPKJHGVSMDHFEQAMSGDVXHAYZSsjyehenjdhjnjdf'), 0,12).'.'.$req->file($tagName)->guessClientExtension();
    }
    
   $done = $req->file($tagName)->move(public_path($path),$rn) ?  ['suc'=>true,'fileName'=>$rn]:['err'=>'Failed to upload file'];
    return $done;
   // return html_entity_decode($string, ENT_QUOTES, 'UTF-8');
}



public  static function uploadArr($req,$size,$rename=true,$path=''){
    $req  = (object)$req;
    //print_r($req)
    $imgErrName = $req->name;
    if(empty($req->name ) ){
        return ['err'=>'File name is empty'];
        exit();
    }

    $alex = array('jpeg','jpg','png','gif','docs','xlsx','xlx','docx','txt','pdf','mp4','mp3','ogg','avi','mpeg');
    $ext   = preg_match('/(?<=\/)\w{0,5}/',$req->type, $extString);

    if(! in_array($extString[0],$alex) ){
        return ['err'=>$extString[0]. " is not allow  for file " .$req->name];
        exit();
    }
 
    if($req->size > $size ){
        return ['err'=>$imgErrName.' File size is more than  ' .($size/1000000).'Mb'];
        exit();
    }
     $rn  =  $req->name;
    if($rename){
     $rn = substr(str_shuffle('abcdfgrutko123456790qweiomdidnc092939239nsddhbd2ASWERTYUIOPKJHGVSMDHFEQAMSGDVXHAYZSsjyehenjdhjnjdf'), 0,24).'.'.$extString[0];
    }
    
   $done = move_uploaded_file($req->tmp_name,$path.$rn) ?  ['suc'=>true,'fileName'=>$rn]:['err'=>'Failed to upload file'];
    return $done;
   // return html_entity_decode($string, ENT_QUOTES, 'UTF-8');
}
public  static function delete($string){
   try {
       unlink($string) ;//code...
   } catch (\Throwable $th) {
       return ['err'=>$th->getMessage()];
   } 
 
}



}