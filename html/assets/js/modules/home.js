define([], function(){
  'use strict';

  console.log('before init | module: home');

  var home = (function(){
    var init = function(){

      console.log('module: home');

      $(document).ready(function() {
       
        /** 
         * Home nav & scroll
         */

        // click on nav to smooth scroll
        function scrollTo($element, $time = 1000){
          $('html, body').stop().animate({
            scrollTop: $($element).offset().top
          }, $time, 'easeInOutCubic');
        };
        $('.js-header-nav-item').click(function(e){
          e.preventDefault();
          scrollTo($(this).attr("href"));
          $(this).closest('ul').find('li').removeClass('active');
          $(this).parent('li').addClass('active');
        });

        // scroll if has id tag on url
        // if($('#SiteContainer').hasClass('p-front')){
        //   console.log('1');
        //   var $currentURL = window.location.href; 
        //   var $siteURL = $currentURL.split("#")[0];
        //   var $id = $currentURL.split("#")[1];
        //   console.log($currentURL);
        //   console.log($siteURL);
        //   console.log($id);
        //   if($id){
        //     scrollTo('#' + $id);
        //     window.setTimeout(function() {
        //       window.history.replaceState(null, null, $siteURL);
        //     }, 100);
        //   }
        // }


        // add class active when scroll to section


      });

    };

    return{
      init: init
    };
  })();

  return home;
});

	
	