<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BC Unimed</title>
    <meta name="description" content="Marshall - Ultimate Coming Soon Template by pixiefy">
    <meta name="author" content="André Phelipe e Ícaro Solon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Icone -->
	<link rel="icon" href="{{ asset('bc/images/loading.svg') }}" type="image/icon type">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800%7CRanga:700%7CIceberg" rel="stylesheet">  
    
    <!-- All CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('bc/css/normalize.css') }}" />
	<link rel="stylesheet" href="{{ asset('bc/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bc/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('bc/css/jquery.mCustomScrollbar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('bc/css/photoswipe.css') }}"> 
	<link rel="stylesheet" href="{{ asset('bc/css/default-skin/default-skin.css') }}">
	<link rel="stylesheet" href="{{ asset('bc/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('bc/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bc/css/responsive.css') }}">
	
	<!-- Modernizr js - required -->
	<script src="{{ asset('bc/js/modernizr.custom.js') }}"></script>

</head>
<body class="mrs-v43 mrs-fill">
	<!-- Page Loader Start -->
	<div class="marshall-loading-screen">
	    <div class="marshall-loading-icon">
	        <div class="marshall-loading-inner">
	        	<img src="/bc/images/loading.svg" />
	        </div>
	    </div>
	</div>
	<!-- End .loading-screen -->

    
	<canvas></canvas>
	<canvas></canvas>

	<div class="marshall-container">
		<div class="marshall-col-6 marshall-middle-6 marshall-col-content">
			<div class="marshall-logo fadeIn fast">
				<img src="{{ asset('bc/images/logo.png') }}" alt="">
			</div>
			<div class="marshall-content jquery-center">
                <form id="search_article">
                    <input type="text" class="pesquisa_input" placeholder="Do que precisa?" autofocus /> <!--  -->
                    <input type="submit" hidden>
                </form>
				 
			 
			</div>

			<div class="marshall-social-column">
				 
			</div>
		</div>
	</div>
	
	<div id="marshall-details" data-animation="mrs-lightSpeedIn" class="marshall-animate-content">
		<div class="marshall-main-content">
			<div class="marshall-the_content">
				 <div id="resultadoPesquisa">
				 	
				 </div>
			</div>
		</div>
	</div>

	<button id="marshall-close-content-slide" class="marshall-content-close"><i class="fa fa-times-thin fa-2x" aria-hidden="true"></i></button>

	<!--Gallery Dependancy -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div> <button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div> <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> 
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
	

	<!-- All marshall js files -->
	<script type="text/javascript" src="{{ asset('bc/js/jquery-3.1.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/classie.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/uiMorphingButton_fixed.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/form-init.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/jquery.ajaxchimp.min.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('bc/js/jquery.mousewheel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/jquery.mCustomScrollbar.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/jquery.textarea_autosize.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/gallery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bc/js/v43/neon-hex.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('bc/js/main.js') }}"></script> 
	
</body>
</html>