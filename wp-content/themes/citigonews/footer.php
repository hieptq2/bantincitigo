<?php
/**
 * Footer
 *
 */
?>

			</div><!-- p-page__wrapper -->
		</div><!-- container -->
		<footer id="SiteFooter" class="l-footer text-center">
			<div class="container">
				<div class="l-footer__content">
					<div class="l-footer__logo">
            <a href="http://www.citigo.com.vn/" target="_blank">
              <img src="<?php echo get_template_directory_uri() . '/assets/img/logo.png'; ?>">
            </a>
          </div>
					<div class="l-footer__copyright">©2019 Citigo VietNam. All Right Reserved</div>
				</div>
			</div>
		</footer>
	</div>

  <?php wp_footer(); ?>

  <script>
  	(function(){
		  'use strict';

		  requirejs.config({
		    baseUrl: '<?php echo get_template_directory_uri() . '/assets/js'; ?>',
		    paths: {
		    	// libs
		      'jquery': 				'libs/jquery.min',
		      'bootstrap': 			'libs/bootstrap.bundle.min',
		      'easing': 				'libs/jquery.easing.min',
		      // modules
		      'base':           'modules/base',
		      'header':         'modules/header',
		      'footer':         'modules/footer',
		      'components':     'modules/components',
		      'home':           'modules/home',
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
		        deps: ['jquery', 'bootstrap', 'easing']
		      },
		      'home':{
		        deps: ['jquery', 'bootstrap', 'easing']
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
		    var listModules = ['components', 'home'];

		    if (currentModule && $.inArray(currentModule, listModules) !== -1) {
		      require([currentModule], function (currentModule) {
		        currentModule.init();
		      });
		    }else{
		      console.log('Not found any Specific Module of Current Page in #SiteContent');
		    }
		  });

		}());
  </script>
</body>

</html>