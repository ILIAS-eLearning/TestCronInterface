<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$finder = PhpCsFixer\Finder::create()
	->exclude(array(
		__DIR__ . '/../../sql',
		__DIR__ . '/../../CI',
	))
	->in([
		__DIR__ .  '/../../classes',
	])
;

return (new PhpCsFixer\Config())
	->setRules([
        '@PSR12' => true,
        'strict_param' => false,
        'concat_space' => ['spacing' => 'one'],
        'function_typehint_space' => true,
        'function_declaration' => ['closure_fn_spacing' => 'none'],
        'binary_operator_spaces' => ['default' => 'single_space'],
        // 'types_spaces' => ['space' => 'single'],
	])
	->setFinder($finder);
