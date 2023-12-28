  <?php

  $books = [
    [
    'name' => 'Do Androids Dream of Electric Sheep',
    'author' => 'Philip K Dick',
    'Website' => 'http://example.com',
    'releasedYear' => 2015
    ],
    [
    'name' => 'The Lanolins',
    'author' => 'Andy Weir',
    'Website' => 'http://example.com',
    'releasedYear' => 2016
    ]
  ];

$filteredBooks = array_filter($books, function ($book) {
    return $book['releasedYear'] > 2000;
});

require "index.view.php";
