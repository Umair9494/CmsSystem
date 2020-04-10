<?php
$file = "example.txt";
if($handle = fopen($file,'r'))
{
//   echo $content = fread($handle,'31');
  echo $content = fread($handle,filesize($file));
}else{
    echo "The application was not able to write a file";
}

fclose($handle);
?>