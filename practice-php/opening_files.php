<?php
$file = "example.txt";
if($handle = fopen($file,'w'))
{
  fwrite($handle,'My name is Mohammad Umair Javed');
}else{
    echo "The application was not able to write a file";
}

fclose($handle);
?>