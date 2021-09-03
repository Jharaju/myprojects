<?php
// if(! empty($_GET['download'])){
//         $foldername= urldecode($_GET['download']);
//         $filePath= $foldername.'/sound.mp3';
//         if(! empty($filePath)){
//             header('Content-Length: '.filesize($filePath));
//             header('Content-Encoding: none');
//             header('Cache-Control: public');
//             header('Content-Description: File Transfer');
//             header('Content-Disposition: attachment; filename=sound.mp3');
//             header('Content-Type: application/zip');
//             header('Content-Transfer-Encoding: binary');
    
//             readfile($filePath);
//             exit;
//         }else{
//             echo "The file".$filename."does not exist";
//         }
//     }
session_start();
if(isset($_SESSION['id'])){
if(! empty($_GET['download'])){
     $foldername= $_GET['download'];
     $dir= realpath($foldername);
     $files= scandir($foldername);
     $countFiles= count($files);
     $zipname= getcwd() . "/Zips/".$foldername.".zip";
    //  print_r($files);
if(! empty($zipname)){
    $zip= new ZipArchive();

     if($zip->open($zipname, ZipArchive::CREATE) === true){
     for ($i=2; $i < $countFiles; $i++) { 
            # code...
            
    $zip->addFromString($files[$i], file_get_contents($foldername.'/'.$files[$i]));
            
         
}
// header("Expires: 0");
//     header("Last-Modified: ".gmdate("D, d M Y H:i:s"), " GMT");
//     header("Cache-Control: no-store, no-cache, must-revalidate");
//     header("Cache-Control: post-check=0, pre-check=0", false);
//     header("Pragma: no-cache");
//     header("Content-Type: application/zip");
//     header('Content-Length: '.filesize($zipname));
//     header('Content-disposition: attachement; filename="'.$zipname.'"');

// echo "<pre>"; 
// print_r($zip);
echo "<div style= 'width: 100%; height: 100%; text-align: center; '><a href='Zips/{$foldername}.zip' download='Zips/{$foldername}.zip' style= 'color:blue; line-height: 10rem; flex-wrap:wrap; font-size: 2rem; background-color: burlywood; text-decoration:none; border-radius:0.2rem; padding:0.5rem;'>Download</a></div>";
$zip->close();
// exit();
    
       }else{echo "Problems occured during opening zip folder";}
     

}else{echo "<div style= 'width: 100%; height: 100%; text-align: center; '><a href='Zips/{$foldername}.zip' download='Zips/{$foldername}.zip' style= 'color:blue; line-height: 10rem; flex-wrap:wrap; font-size: 2rem; background-color: burlywood; text-decoration:none; border-radius:0.2rem; padding:0.5rem;'>Download</a></div>"; }
}
}else{
      echo "<div style= 'width: 100%; height: 100%; text-align: center; '><h1 style= 'line-height:10rem; display: flex; flex-wrap:wrap; font-size: 2rem; color: tomato'>You are not Logged in! Please Login...<h1/></div>";
}  


?>