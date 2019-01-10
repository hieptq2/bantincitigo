define([], function(){

  console.log('before init | module: home');

  var home = (function(){
    var init = function(){

      console.log('module: home');

      $(document).ready(function() {

        // click on nav to smooth scroll
        var  scrollTo = function($element, $time){
          $('html, body').stop().animate({
            scrollTop: $($element).offset().top
          }, $time, 'easeInOutCubic');
        };


        $('.js-header-nav__list li a').click(function(e){
          e.preventDefault();
          scrollTo($(this).attr("href"), 1000);
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

	
	


