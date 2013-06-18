<?php

class ImageBehavior extends CBehavior
{   
    public function getMainImage()
    {
        $images = $this->getAllImages();
        return $images[0];
    }
    
    public function getAllImages()
    {     
        $owner = $this->getOwner();
        $model = $owner->tableName();
        $id = $owner->id;
        $dir = '/images/'.$model.'/'.$id.'/';
        $absoluted_dir = __DIR__.'/../..'.$dir;
        $images = array();
        if (file_exists($absoluted_dir) && $handle = opendir($absoluted_dir)) {                        
            while (false !== ($file = readdir($handle))) {
                if (strpos($file, '.') != 0) {
                    $images[] = Yii::app()->baseUrl.$dir.$file;
                }
            }        
            closedir($handle);
        }
        if (count($images) == 0) {
            $images[] = Yii::app()->baseUrl.'/images/'.'no-image.jpg';
        }
        return $images;
   }       
}
?>
