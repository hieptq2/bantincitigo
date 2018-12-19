/**
 * REQUIREJS configuration file
 *
 */

(function(){
  'use strict';

  requirejs.config({

    baseUrl: 'assets/js',
    paths: {

    	// libraries
      'jquery': [
        // 'https://code.jquery.com/jquery-3.3.1.min.js',
      	'libs/jquery.min'
      ],
      'bootstrap': [
        // 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js',
        'libs/bootstrap.bundle.min'
      ],
      'easing': [
        // 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js',
        'libs/jquery.easing.min'
      ],	
      'swiper': [
        // https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.x.x/js/swiper.min.js,
        'libs/swiper.min'
      ],
      'select2': [
        'libs/select2.full.min'
      ],

      // modules
      'base':           'modules/base',
      'header':         'modules/header',
      'footer':         'modules/footer',

      'components':     'modules/components',
    },

    shim:{

  		// libraries
      'jquery': {
        exports: '$'
      },
      'easing': {
      	deps: ['jquery']
      },

      // modules
      'base': {
        deps: ['jquery', 'bootstrap']
      },
      'header': {
        deps: ['jquery', 'bootstrap']
      },
      'footer': {
        deps: ['jquery', 'bootstrap']
      },

      'components':{
        deps: ['jquery', 'bootstrap', 'swiper', 'easing', 'select2']
      },
      
    }
  });

  require([
    'base',
    'header',
    'footer',
  	'jquery',
  	'bootstrap',
  	'easing'
  ], function(base, header, footer, $, bootstrap, easing){

    // Global module
    base.init();
    header.init();
    footer.init();

    // Page specific module
    var currentModule = $('#SiteContent').attr('data-js-module');
    var listModules = ['components'];

    if (currentModule && $.inArray(currentModule, listModules) !== -1) {
      require([currentModule], function (currentModule) {
        currentModule.init();
      });
    }else{
      console.log('Not found any Specific Module of Current Page in #SiteContent');
    }
  });

}());

