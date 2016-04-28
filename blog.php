<?php
header("Location: http://eecs.csuohio.edu/~alkonang/final/index.html");		//change to final location.  must be absolute path
exit();

$title = _POST ["title"];
$name = _POST ["name"];
if(!empty(_POST["post"])){
$post = _POST ["post"];
}
if(!empty(_POST["fileToUpload"])){
$file = _POST ["fileToUpload"];
}
if(!empty(_POST["tubeyou"])){
$link = _POST ["tubeyou"];
}

$image_dir = "images/";
$image_file = $image_dir_dir . basename ( $file );
$uploadOk = 1;
$imageFileType = pathinfo ( $image_file_file, PATHINFO_EXTENSION );

// Allow certain file formats
if ($file == NULL && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
} else {
	move_uploaded_file ( $file, $image_file );
	
}


if($link != NULL){
	$vidflag = true;
}else{
	$vidflag = false;
}

$file_dir = "posts/";
$file_file = $file_dir.$title;
$myfile = fopen($file_file, "w");

$txt = '<div class="blog">';
$txt .= '<h2 class="blog-header">'.$title.'</h2>';
if ($post != NULL){
	$txt.= '<p class="blog-content">'.$post.'</p>';
	
}

if($uploadOk){
	$txt.='<img src="'.$image_file.'" alt= "'.$file.'" />';
}

if ($vidflag){
	$txt.='<embed width="420" height="315" src=">'.$link.'>';
}

$txt.= '<p class="author">'.$name.'</p>';

fwrite($myfile, $txt);
fclose($myfile);

?>