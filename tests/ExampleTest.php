<?php

dd(\Rokde\LaravelConfigurationObjectified\Config\AppConfig::makeDefault()->toArray());

it('can test', function () {
    expect(true)->toBeTrue();
});
