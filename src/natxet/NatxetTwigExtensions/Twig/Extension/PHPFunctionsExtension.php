<?php
namespace natxet\NatxetTwigExtensions\Twig\Extension;

class PHPFunctionsExtension extends \Twig_Extension {

	public function __construct() {}

	public function getFilters() {
		return array(
			'is_array'  => new \Twig_Filter_Function('is_array'),
			'is_empty'  => new \Twig_Filter_Function('is_empty'),
			'empty'     => new \Twig_Filter_Function('is_empty'),
			'not_array' => new \Twig_Filter_Function('not_array'),
			'not_empty' => new \Twig_Filter_Function('not_empty')
		);
	}

	// interface required
	public function getName() {
		return 'natxet_php_functions';
	}
}
