/**
 * Helper module for making AJAX requests to Nirvana controllers
 */
/*global define*/

(function (context) {
	'use strict';

	function nirvana($) {
		function getUrl( options ) {
			var dataParams = options.data || {},
				format = (options.format || 'json').toLowerCase(),
				i,
				key,
				sortedDict = {},
				sortedKeys = [],
				urlParams,
				url = options.scriptPath || context.wgServer + context.wgScriptPath;

			if ( ( typeof options.controller === 'undefined' ) || ( typeof options.method === 'undefined' ) ) {
				throw 'controller and method are required';
			}

			urlParams = {
				controller: options.controller.replace( /Controller$/, '' ),
				method: options.method
			};

			if (typeof dataParams === 'string') {
				dataParams += '&format=' + format;
			} else {
				dataParams.format = format;
			}

			// Sort params to avoid creating many urls on varnish
			if ( typeof dataParams !== 'string' ) {
				for( key in dataParams ) {
					sortedKeys[sortedKeys.length] = key;
				}
				sortedKeys.sort();
				for( i = 0; i < sortedKeys.length; i++ ) {
					sortedDict[sortedKeys[i]] = dataParams[sortedKeys[i]];
				}
				dataParams = $.param( sortedDict );
			}

			return url + '/wikia.php?' + $.param( urlParams ) + '&' + dataParams;
		}

		function sendRequest(attr) {
			var type = (attr.type || 'POST').toUpperCase(),
				format = (attr.format || 'json').toLowerCase(),
				data = {},
				callback = attr.callback || function() {},
				onErrorCallback = attr.onErrorCallback || function() {},
				url;


			if( !(format === 'json' || format === 'html' || format === 'jsonp' ) ) {
				throw 'Only Json,Jsonp and Html format are allowed';
			}

			if ( type === 'POST' && typeof attr.data !== 'undefined' ) {
				data = attr.data;
				delete attr.data;
			}
			url = getUrl( attr );

			return $.ajax({
				url: url,
				dataType: format,
				type: type,
				data: data,
				success: callback,
				error: onErrorCallback
			});
		}

		return {
			sendRequest: sendRequest,
			getUrl: getUrl,
			getJson: function(controller, method, data, callback, onErrorCallback) {
				if(typeof data === 'function') {
					// callback is in data slot, shift parameters
					onErrorCallback = callback;
					callback = data;
					data = {};
				}
				return sendRequest({
					controller: controller,
					method: method,
					data: data,
					type: 'GET',
					callback: callback,
					onErrorCallback: onErrorCallback
				});
			},
			postJson: function (controller, method, data, callback, onErrorCallback) {
				if(typeof data === 'function') {
					// callback is in data slot, shift parameters
					onErrorCallback = callback;
					callback = data;
					data = {};
				}
				return sendRequest({
					controller: controller,
					method: method,
					data: data,
					callback: callback,
					onErrorCallback: onErrorCallback
				});
			}
		};
	}

	if (context.define && context.define.amd) {
		context.define('wikia.nirvana', ['jquery'], nirvana);
	}

	if(context.jQuery) {
		context.jQuery.nirvana = nirvana(context.jQuery);
	}
}(this));
