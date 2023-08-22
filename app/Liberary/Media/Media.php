<?php
namespace App\Liberary\Media;
use Illuminate\Support\Facades\Storage;

class media{

    public static function uploadMedia($destination_path,$file,$resize = null)
    {
        if(is_array($file)){
            foreach ($file as $value)
            {
                $extension  = $value->extension();
                $fileUrl   = Storage::put($destination_path, $value);
                if($extension == 'jpg' || $extension = 'png' || $extension == 'jpeg')
                    self::resize($destination_path,$fileUrl,$resize);

                $filename[] = $fileUrl;
            }
        }else{
            $extension  = $file->extension();
            $filename = Storage::put($destination_path, $file);
           
        }
        
        return $filename;
    }
    public static function uploadMediaByContent($destination_path,$file_content,$resize = null)
    {
        
        
        $images=array();
        foreach ($file_content as  $value) {
            $contents = file_get_contents($value);
            $filename  = time() . uniqid() . '.jpg';
             Storage::put($destination_path . '/' . $filename, $contents);
             $images[]=$destination_path . '/' . $filename;
        }
        
        return $images;
    }

    public static function uploadMediaByPath($destination_path,$file,$resize)
    {
        if(is_array($file)){
            foreach ($file as $value)
            {
                $extension  = $value->extension();
                $fileUrl   = Storage::putFile($destination_path, new File($value));
                $filename[] = $fileUrl;
            }
        }else{
            $extension  = pathinfo($file,PATHINFO_EXTENSION);
            $filename = Storage::putFile($destination_path, new File($file));
           return $filename;
    }
   
}
}