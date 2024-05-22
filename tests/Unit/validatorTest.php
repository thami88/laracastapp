<?php

it('validate a string',function() {
    expect(\Core\Validator::string('foobar'))->toBeTrue();
});

it('validate a string with a minimum length',function() {
    expect(\Core\Validator::string('foobar', 20))->toBeFalse();
});

it('validate and email', function(){
    expect(\Core\Validator::email('foobar'))->toBeFalse();
    expect(\Core\Validator::email('foobar@gmail.com'))->toBeTrue();
});