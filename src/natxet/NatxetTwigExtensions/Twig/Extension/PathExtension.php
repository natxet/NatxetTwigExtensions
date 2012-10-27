<?php
namespace natxet\NatxetTwigExtensions\Twig\Extension;

class PathExtension extends \Twig_Extension {

	protected $app;

	function __construct(\Silex\Application $app) {
		$this->app = $app;
	}

	public function getFunctions() {
		return array(
			'path' => new \Twig_Function_Method($this, 'path'),
			'page' => new \Twig_Function_Method($this, 'page'),
		);
	}

	public function path($path_name,$param=array()) {
		if(isset($this->app['config']['localised_urls']) && $this->app['config']['localised_urls']
			&& !isset($param['locale'])) {
			$param['locale'] = $this->app['locale'];
		}
		return $this->app['url_generator']->generate($path_name, $param);
	}

	public function page($page) {
		$param = array(
			'locale' => $this->app['locale'],
			'page' => $this->app['translator']->trans($page)
		);
		return $this->app['url_generator']->generate('page', $param);
	}

	/**
	* Returns the name of the extension.
	*
	* @return string The extension name
	*/
	public function getName() {
		return 'natxet_path';
	}
}
