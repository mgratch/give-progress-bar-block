<?php
/**
 * Plugin Name: Give Progress Bar Block
 * Description: A custom block for GiveWP that displays a progress bar for a specific donation form.
 * Version: 0.1.0
 * Author: Marc Gratch
 *
 * @package give-cover-block-extended
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class Give_Cover_Block_Extended
 */
class Give_Progress_Bar_Block {

	/**
	 * Initialize the plugin by setting up hooks.
	 */
	public function init(): void {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue scripts and styles for block editor.
	 */
	public function enqueue_assets(): void {
		$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';
		wp_enqueue_script(
			'give-progress-bar-block-extended',
			plugins_url( 'build/index.js', __FILE__ ),
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);
	}
}

add_action( 'plugins_loaded', array( new Give_Progress_Bar_Block(), 'init' ) );
