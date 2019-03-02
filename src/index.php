#!/usr/bin/env php
<?php

require '../vendor/autoload.php';

$app = new \Symfony\Component\Console\Application('creator');

$app->add(new \DockerSymfony\Commands\create('python', 'projet'));

try {
    $app->run();
} catch (Exception $e) {
    dump($e);
}
