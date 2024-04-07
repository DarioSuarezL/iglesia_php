<?php

    namespace App\Controllers;

    class Controller{
        public function view($target, $data = []){

            extract($data); //Destructura el array y crea variables con los nombres de las claves y les asigna los valores

            $target = str_replace('.', '/', $target);

            if(file_exists("../app/Views/$target.php")){

                ob_start();
                include "../app/Views/$target.php";
                $content = ob_get_clean();

                return $content;
            }else{
                echo "ERROR: View not found";
            }

        }
    }