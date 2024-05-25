<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/{Contracts,Enum,Tests,Trait,Tests}')
;

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@Symfony' => true,
        'concat_space' => ['spacing' => 'none'],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
    ])
    ->setRiskyAllowed(true)
    ->setLineEnding("\n")
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/.php-cs-fixer.cache')
    ;
