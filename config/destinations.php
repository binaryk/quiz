<?php
$out1 = [
    'en' => [
        'in1' =>         public_path() . '/files/controller.txt',
        'out1' =>        public_path() .DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,///var/www/html/application/controllers/file.php
        'in2' =>         public_path() . DIRECTORY_SEPARATOR . 'files/view.php',
        'out2' =>        public_path() . DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR .'view' . DIRECTORY_SEPARATOR,////var/www/html/application/views/pages/file.php
        'new_folder' =>  public_path() . DIRECTORY_SEPARATOR. 'out'.DIRECTORY_SEPARATOR,
        'sample' =>      public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',///var/www/html/assets/img/sample
        'photos_dest' => public_path() . DIRECTORY_SEPARATOR . 'out'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR,////var/www/html/assets/img/catlook
        'local_coords' => public_path() . DIRECTORY_SEPARATOR . 'out' . DIRECTORY_SEPARATOR . 'coords' . DIRECTORY_SEPARATOR,
    ],
    'ro' => [
        'in1' =>         public_path() . '/files/ro/controller.txt',
        'out1' =>        public_path() .DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,///var/www/html/application/controllers/file.php
        'in2' =>         public_path() . DIRECTORY_SEPARATOR . 'files/ro/view.php',
        'out2' =>        public_path() . DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR .'view' . DIRECTORY_SEPARATOR,////var/www/html/application/views/pages/file.php
        'new_folder' =>  public_path() . DIRECTORY_SEPARATOR. 'out'.DIRECTORY_SEPARATOR,
        'sample' =>      public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',///var/www/html/assets/img/sample
        'photos_dest' => public_path() . DIRECTORY_SEPARATOR . 'out'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR,////var/www/html/assets/img/catlook
        'local_coords' => public_path() . DIRECTORY_SEPARATOR . 'out' . DIRECTORY_SEPARATOR . 'coords' . DIRECTORY_SEPARATOR,
    ],
];

$out2 = [
    'en' => [
        'in1' =>         public_path() . '/files/controller.txt',
        'out1' =>        DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR,//public_path() .DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,///var/www/html/application/controllers/file.php
        'in2' =>         public_path() . DIRECTORY_SEPARATOR . 'files/view.php',
        'out2' =>        DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR, //public_path() . DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,////var/www/html/application/views/pages/file.php
        'new_folder' =>  DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'ro'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR,//public_path() . DIRECTORY_SEPARATOR. 'out'.DIRECTORY_SEPARATOR,
        'sample' =>      DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'sample'.DIRECTORY_SEPARATOR,//public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',///var/www/html/assets/img/sample
        'photos_dest' => DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR,//public_path() . DIRECTORY_SEPARATOR . 'out'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR,////var/www/html/assets/img/catlook
        'local_coords' => public_path() . DIRECTORY_SEPARATOR . 'out' . DIRECTORY_SEPARATOR . 'coords' . DIRECTORY_SEPARATOR,
    ],
    'ro' => [
        'in1' =>         public_path() . '/files/ro/controller.txt',
        'out1' =>        DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'ro'.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR,//public_path() .DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,///var/www/html/application/controllers/file.php
        'in2' =>         public_path() . DIRECTORY_SEPARATOR . 'files/ro/view.php',
        'out2' =>        DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'ro'.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR, //public_path() . DIRECTORY_SEPARATOR. 'out' . DIRECTORY_SEPARATOR,////var/www/html/application/views/pages/file.php
        'new_folder' =>  DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'ro'.DIRECTORY_SEPARATOR.'ro'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR,//public_path() . DIRECTORY_SEPARATOR. 'out'.DIRECTORY_SEPARATOR,
        'sample' =>      DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'ro'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'sample'.DIRECTORY_SEPARATOR,//public_path() . DIRECTORY_SEPARATOR .'out'.DIRECTORY_SEPARATOR.'sample',///var/www/html/assets/img/sample
        'photos_dest' => DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'html'.DIRECTORY_SEPARATOR.'ro'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR,//public_path() . DIRECTORY_SEPARATOR . 'out'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR,////var/www/html/assets/img/catlook
        'local_coords' => public_path() . DIRECTORY_SEPARATOR . 'out' . DIRECTORY_SEPARATOR . 'coords' . DIRECTORY_SEPARATOR,
    ],

];
return env('APP_ENV') == 'local' ? $out1 : $out2;
