<?php
//TODO create a routemanager so that we only have an array in this file
$app['router']->get('/', function() {
    return 'Hello World';
});