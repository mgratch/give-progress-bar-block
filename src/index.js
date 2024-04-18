(function (wp) {
	wp.hooks.addFilter('blocks.registerBlockType', 'custom/block-modifier', function (settings, name) {
		// Target the specific block whose attributes you want to change
		if (name === 'give/progress-bar') {
			// Clone settings to avoid direct modification of the original object
			const newSettings = {...settings};

			// Remove the 'parent' property
			delete newSettings.parent;

			// Return the modified settings
			return newSettings;
		}

		// Return the settings unmodified for other blocks
		return settings;
	});
})(window.wp);
