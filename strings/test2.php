<?php
$strings = array (
    'You like to have a fun time',
    'You are a really nice person',
    'Would you like to have a cup of coffee?'
);

$search = array (
    'fun',
    'time',
    'person',
    'coffee'
);
$replace = array (
    'excellent',
    'adventure',
    'individual',
    'joe'
);

$replaced = str_replace ( $search, $replace, $strings );

print_r ( $replaced );