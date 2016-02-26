<?php
$out1 = [
    'in1' =>         public_path() . '/files/controller.txt',
    'out1' =>        public_path() .DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,///var/www/html/application/controllers/file.php
    'in2' =>         public_path() . DIRECTORY_SEPARATOR . 'files/view.php',
    'out2' =>        public_path() . DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,////var/www/html/application/views/pages/file.php
    'new_folder' =>  public_path() . DIRECTORY_SEPARATOR. 'out'.DIRECTORY_SEPARATOR,
    'sample' =>      public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',///var/www/html/assets/img/sample
    'photos_dest' => public_path() . DIRECTORY_SEPARATOR . 'out'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR,////var/www/html/assets/img/catlook
    'server_sample' => public_path() . DIRECTORY_SEPARATOR . 'out' . DIRECTORY_SEPARATOR . 'dog' . DIRECTORY_SEPARATOR,
];

$out2 = [
    'in1' =>         public_path() . '/files/controller.txt',
    'out1' =>        '/var/www/html/application/controllers/',//public_path() .DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,///var/www/html/application/controllers/file.php
    'in2' =>         public_path() . DIRECTORY_SEPARATOR . 'files/view.php',
    'out2' =>        '/var/www/html/application/views/pages/', //public_path() . DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,////var/www/html/application/views/pages/file.php
    'new_folder' =>  '/var/www/html/ro/uploads/',//public_path() . DIRECTORY_SEPARATOR. 'out'.DIRECTORY_SEPARATOR,
    'sample' =>      public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',//public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',///var/www/html/assets/img/sample
    'photos_dest' => '/var/www/html/assets/img/',//public_path() . DIRECTORY_SEPARATOR . 'out'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR,////var/www/html/assets/img/catlook
    'server_sample' => '/var/www/html/assets/img/sample/',
];
return env('APP_ENV') == 'local' ? $out1 : $out2;
