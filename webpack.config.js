const [ scriptConfig, moduleConfig ] = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = [
	{
		...scriptConfig,
		entry: {
			...scriptConfig.entry(),
			'editor-script': path.resolve( __dirname, 'src/editor-script.js' ),
			'frontend-script': path.resolve( __dirname, 'src/frontend-script.js' ),
		},
	},
	moduleConfig,
];
