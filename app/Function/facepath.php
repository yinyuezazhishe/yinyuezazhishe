<?php
	/**
	 * [将Base64图片转换为本地图片并保存]
	 * @param  [Base64] $base64_image_content [要保存的Base64]
	 * @param  [目录] $path [要保存的路径]
	 */
	function base64_image_content($base64_image_content,$name){
	    //匹配出图片的格式
	    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
	        $type = $result[2];
	        $new_file = "./homes/uploads/";
	        if(!file_exists($new_file)){
	            //检查是否有该文件夹，如果没有就创建，并给予最高权限
	            mkdir($new_file, 0700);
	        }
	        $new_file = $new_file.$name.".{$type}";
	        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
	            return '/'.$new_file;
	        }else{
	            return false;
	        }
	    }else{
	        return false;
	    }
	}
?>