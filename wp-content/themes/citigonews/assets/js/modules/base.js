define([], function(){
  'use strict';

  console.log('before init | module: base');

  var base = (function(){
    var init = function(){

      console.log('module: base');

    };

    return{
      init: init
    };
  })();

  return base;
});

	