<?php

declare( strict_types=1 );

/**
 * Class __Plugin_Name_Class___Loader.
 *
 * Register all actions and filters for the plugin.
 * Maintain a list of all hooks that are registered throughout the plugin, and
 * register them with the WordPress API. Call the run function to execute the
 * list of actions and filters.
 *
 * @package    __plugin_name__
 * @subpackage src/includes
 *
 * @since      1.0.0
 */
class __Plugin_Name_Class___Loader {

	/**
	 * @var array $actions The actions registered with WordPress to fire when
	 *     this plugin loads.
	 */
	protected array $actions;

	/**
	 * @var array $filters The filters registered with WordPress to fire when
	 *     this plugin loads.
	 */
	protected array $filters;

	/**
	 * Constructor.
	 *
	 * Initialize the collections used to maintain the actions and filters.
	 */
	public function __construct() {
		$this->actions = [];
		$this->filters = [];
	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @return void
	 */
	public function run(): void {
		$this->register_filters( $this->filters );
		$this->register_actions( $this->actions );
	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @param  string  $hook  The name of the WordPress action that is being
	 *     registered.
	 * @param  object  $component  A reference to the instance of the object on
	 *     which the action is defined.
	 * @param  string  $callback  The name of the function definition on the
	 *     $component.
	 * @param  int  $priority  Optional. The priority at which the function
	 *     should be fired. Default is 10.
	 * @param  int  $accepted_args  Optional. The number of arguments that
	 *     should be passed to the $callback. Default is 1.
	 *
	 * @return void
	 */
	public function add_action(
		string $hook,
		object $component,
		string $callback,
		int $priority = 10,
		int $accepted_args = 1
	): void {
		$this->actions = $this->add( $this->actions,
			$hook,
			$component,
			$callback,
			$priority,
			$accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @param  string  $hook  The name of the WordPress filter that is being
	 *     registered.
	 * @param  object  $component  A reference to the instance of the object on
	 *     which the filter is defined.
	 * @param  string  $callback  The name of the function definition on the
	 *     $component.
	 * @param  int  $priority  Optional. The priority at which the function
	 *     should be fired. Default is 10.
	 * @param  int  $accepted_args  Optional. The number of arguments that
	 *     should be passed to the $callback. Default is 1
	 *
	 * @return void
	 */
	public function add_filter(
		string $hook,
		object $component,
		string $callback,
		int $priority = 10,
		int $accepted_args = 1
	): void {
		$this->filters = $this->add( $this->filters,
			$hook,
			$component,
			$callback,
			$priority,
			$accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a
	 * single collection.
	 *
	 * @param  array  $hooks  The collection of hooks that is being registered
	 * @param  string  $hook  The name of the WordPress filter that is being
	 *     registered.
	 * @param  object  $component  A reference to the instance of the object on
	 *     which the filter is defined.
	 * @param  string  $callback  The name of the function definition on the
	 *     $component.
	 * @param  int  $priority  The priority at which the function should be
	 *     fired.
	 * @param  int  $accepted_args  The number of arguments that should be
	 *     passed to the $callback.
	 *
	 * @return   array
	 */
	private function add(
		array $hooks,
		string $hook,
		object $component,
		string $callback,
		int $priority,
		int $accepted_args
	): array {
		$hooks[] = [
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		];

		return $hooks;
	}

	/**
	 * Register all filters with WordPress
	 *
	 * @param  array  $filters
	 *
	 * @return void
	 */
	private function register_filters( array $filters ): void {
		foreach ( $filters as $filter ) {
			add_filter(
				$filter['hook'],
				[
					$filter['component'],
					$filter['callback'],
				],
				$filter['priority'],
				$filter['accepted_args']
			);
		}
	}

	/**
	 * Register all actions with WordPress
	 *
	 * @param  array  $actions
	 *
	 * @return void
	 */
	private function register_actions( array $actions ): void {
		foreach ( $actions as $action ) {
			add_action(
				$action['hook'],
				[
					$action['component'],
					$action['callback'],
				],
				$action['priority'],
				$action['accepted_args']
			);
		}
	}

}