const defaultConfig = require( '@wordpress/scripts/config/eslint.config.cjs' );

module.exports = [
	...defaultConfig,
	{
		languageOptions: {
			globals: {
				jQuery: 'readonly',
				$: 'readonly',
			},
		},
		rules: {
			'@wordpress/no-global-active-element': 'warn',
			'@wordpress/no-unsafe-wp-apis': 'warn',
		},
	},
];
