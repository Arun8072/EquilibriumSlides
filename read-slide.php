<?php 
// Opening a file 
$file = "current_slide.txt"; 
  // Reading the entire file into a string
 $content = file_get_contents($file);
 // or die("ERROR: Cannot open the file."); 
// Display the file content
  echo $content; 
?>