<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    // arrange
    $container = new Container;
    // act
    $container->bind('foo', fn()=>'bar');
    // assert/expect
    $result = $container->resolve('foo');

    expect($result)->toEqual('bar');
});
