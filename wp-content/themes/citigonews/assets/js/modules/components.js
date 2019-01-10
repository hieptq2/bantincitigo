define([], function(){
  'use strict';

  var home = (function(){
    var init = function(){

      console.log('module: components');

      $(document).ready(function() {
        $('.js-example-basic-single').select2({
          containerCssClass: 's-select2'
        });

        $('.js-example-basic-multiple').select2({
          containerCssClass: 's-select2',
          // closeOnSelect: false,
        });
      });

    };

    return{
      init: init
    };
  })();

  return home;
});

	
	