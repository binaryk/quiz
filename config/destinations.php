<?php

return [
    'in1' => public_path() . '/files/controller.txt',
    'out1' => public_path() .DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,///var/www/html/application/controllers/file.php
    'in2' => public_path() . DIRECTORY_SEPARATOR . 'files/view.php',
    'out2' => public_path() . DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,////var/www/html/application/views/pages/file.php
    'new_folder' => public_path() . DIRECTORY_SEPARATOR. 'out'.DIRECTORY_SEPARATOR,
    'sample' => public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',///var/www/html/assets/img/sample
    'photos_dest' => public_path() . DIRECTORY_SEPARATOR . 'out'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR,////var/www/html/assets/img/catlook
];