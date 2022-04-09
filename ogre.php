<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;

use Grav\Common\Grav;

/**
 * Class OgrePlugin
 * @package Grav\Plugin
 */
class OgrePlugin extends Plugin {
	public static function getSubscribedEvents(): array {
		return [
			'onPluginsInitialized' => [
				['onPluginsInitialized', 0],
			]
		];
	}

	/* Vendors? These people are nothing to me. */
	/**
	 * Composer autoload
	 *
	 * @return ClassLoader
	 */
	/*
	 public function autoload(): ClassLoader {
		return require __DIR__ . '/vendor/autoload.php';
	}
	*/

	/**
	 * Initialize the plugin
	 */
	public function onPluginsInitialized(): void {
		// Don't proceed if we are in the admin plugin
		if ($this->isAdmin()) {
			return;
		}

		// Enable the main events we are interested in
		$this->enable([
			'onTwigTemplatePaths' => ['addTwigTemplatePaths', 0], # I guess I could mess with this rank/score parameter to gain greater control
			'onTwigLoader' => ['addSystemTwigNamespace', 10],
		]);
	}

	// add Grav system templates as namespace to twig - would love to know if they are available a better way!
	public function addSystemTwigNamespace() {
		$system = $this->grav['locator']->findResource('system://templates');
		$this->grav['twig']->addPath($system . DIRECTORY_SEPARATOR, 'system');
	}

	/**
	* Add current directory to twig lookup paths.
	*/
	public function addTwigTemplatePaths() {
		$this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
	}

}
