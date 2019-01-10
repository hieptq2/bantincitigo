define([], function(){
  'use strict';

  console.log('before init | module: header');

  var header = (function(){
    var init = function(){

      console.log('module: header');

      $('.js-header-toggle').click(function(e) {
        e.preventDefault();
        $(this).toggleClass('is-actived');
        $('.js-header-nav').toggleClass('is-actived');
      });

    };

    return{
      init: init
    };
  })();

  return header;
});

	
	