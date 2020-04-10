<?php
class car{
        function moveWheels(){
            echo "Wheels are moving";
        }
}


if(class_exists("car","moveWheels")){
    echo "Existsssssssssss";
}
else{
    echo "not exists";
}
?>