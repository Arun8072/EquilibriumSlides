<?php
/* 
$file_name = 'current_slide.txt'; //opens the file.txt file or implicitly creates the file 
$myfile = fopen($file_name, 'w+') or die('Cannot open file: '.$file_name);
 $movie_name = "The Man from Earth \n"; // write name to the file 
 fwrite($myfile, $movie_name); 
 // close the file 
 fclose($myfile);  
*/
 
 $file = "current_slide.txt";
  // String of data to be written 
  echo $data = $_POST['currentslide'];
  // Write data to the file 
 file_put_contents($file, $data) or die("ERROR: Cannot write the file.");
  
?>