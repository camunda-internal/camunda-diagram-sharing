﻿<?php
session_start();
	if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true) {
	
$ds          = DIRECTORY_SEPARATOR; 
 
$storeFolder = dirname( __FILE__ ).$ds.$_SESSION['dir'].$ds.'uploads'; 
 
if (!empty($_FILES)) {
 
    $tempFile = $_FILES['file']['tmp_name'];         
 
    $targetPath = $storeFolder . $ds; 
 
    $targetFile =  $targetPath. $_FILES['file']['name']; 
 
    move_uploaded_file($tempFile,$targetFile);
 
} else {                                                           
    $result  = array();
 
    $files = scandir($storeFolder);                 //1
    if ( false!==$files ) {
        foreach ( $files as $file ) {
            if ( '.'!=$file && '..'!=$file) {       //2
                $obj['name'] = $file;
                $obj['size'] = filesize($storeFolder.$ds.$file);
                $result[] = $obj;
            }
        }
    }
     
    header('Content-type: text/json');              //3
    header('Content-type: application/json');
    echo json_encode($result);
}
	}
?>