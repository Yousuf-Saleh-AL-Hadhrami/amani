<?php 

function uploadImage(array $image , string $path):string 
{
    
        // get image 
        $image_name = $image['name'];
        $tmp_name = $image['tmp_name'];
        $size = $image['size'];

        
        $exploded_string = explode(".", $image_name);
        $extension = end($exploded_string);
        $extension2 = strtolower($extension);
    
        $full_path = $path . time() . '.'. $extension2;

       if(file_exists($path))
        {
            move_uploaded_file($tmp_name , $full_path);

        }


        return $full_path;

}