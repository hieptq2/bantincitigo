define([], function(){
  'use strict';

  var base = (function(){
    var init = function(){

      console.log('module: init base');

    };

    return{
      init: init
    };
  })();

  return base;
});

	