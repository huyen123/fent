<?php

class ImageBehavior extends CBehavior
{   
    public $attr = null;
    
    public function getDirectory()
    {
        $owner = $this->getOwner();
        $model = $owner->tableName();
        if ($this->attr) {
            $folder_name = $owner->{$this->attr};
        } else {
            $folder_name = $owner->id;
        }
        $dir = '/images/'.$model.'/'.$folder_name.'/';
        return $dir;
    }
    
    public function getMainImage()
    {
        $images = $this->getAllImages();
        return $images[0];
    }
    
    public function getAllImages()
    {
        $dir = $this->getDirectory();
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
    
    public function createDirectoryIfNotExists()
    {
        $dir = $this->getDirectory();
        $absoluted_dir = __DIR__.'/../..'.$dir;
        if (!file_exists($absoluted_dir)) {
            mkdir($absoluted_dir);
            chmod($absoluted_dir, 0777); 
        }
        return $absoluted_dir;
    }
    
    public function removeMainImage() {
        $dir = $this->getDirectory();
        $absoluted_dir = __DIR__.'/../..'.$dir;
        if (file_exists($absoluted_dir) && $handle = opendir($absoluted_dir)) {                        
            while (false !== ($file = readdir($handle))) {
                if (strpos($file, '.') != 0) {
                    unlink($absoluted_dir.$file);
                    break;
                }
            }        
            closedir($handle);
        }
    }
   
}
?>
