<?php

namespace App\Functions;

class General{
	public static function uploadImage($checkImage=null, $requestImage, $nameImageDB=null){
		           
            $img = $requestImage;
            $img_name = time()."_".$img->getClientOriginalName();
            $pathImage = 'upload/images/'.$img_name;          
            $img->move('upload/images',$img_name);
            return $pathImage;
        
	}
    /**
     * Auto upload image to SummerNote 
     * @param  $detail is SummerNote content
     * @return $detail 
     */
    public static function uploadImageSummerNote($detail){
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' .$detail);   
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            if($data){
                try {
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    $image_name= "/upload/summer_note/" . time().$k.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                } catch (\Exception $e) {
                    continue;
                }
                
            }            
        }
        $detail = $dom->saveHTML();
        return $detail;
    }
}