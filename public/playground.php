 <?php

use Illuminate\Support\Collection;

 require __DIR__.'/../vendor/autoload.php';

 $numbers = new Collection(
    [
        'one',
        'two',
        'three',
        'four'
    ]
);

die(var_dump($numbers));