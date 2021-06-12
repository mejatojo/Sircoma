<?php
use App\Models\Langue;
session_start();
return [
    'lang'=>$_SESSION['lang'] ? $_SESSION['lang'] : $_SESSION['lang']='1',
    'langues'=>App\Models\Langue::class
];