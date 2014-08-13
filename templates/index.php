<!DOCTYPE html>
<html>
  <head>
    <title><?= $title; ?></title>

    <!-- Meta Data -->
    <?= $meta; ?>

    <!-- CSS: Plugins > Fancybox -->
    <link type="text/css" rel="stylesheet" media="all" href="/libs/vendor/fancybox/css/jquery.fancybox.css" />
    <link type="text/css" rel="stylesheet" media="all" href="/libs/vendor/fancybox/css/jquery.fancybox-thumbs.css" />
    <link type="text/css" rel="stylesheet" media="all" href="/libs/vendor/fancybox/css/jquery.fancybox-buttons.css" />
    <!-- CSS: Plugins > Could-Zoom -->
    <link type="text/css" rel="stylesheet" media="all" href="/libs/vendor/cloud-zoom/css/jquery.cloud-zoom.css" />
    <!-- CSS: Plugins > BX Slider -->
    <link type="text/css" rel="stylesheet" media="all" href="/libs/vendor/bx-slider/css/jquery.bx-slider.css" />
    <!-- CSS: Plugins > Classic Accordian -->
    <link type="text/css" rel="stylesheet" media="all" href="/libs/vendor/classic-accordion/css/jquery.classic-accordion.css" />

    <!-- CSS: Custom Styles -->
    <link type="text/css" rel="stylesheet" media="all" href="/libs/css/index.css" />

    <!-- JS: Plugins > Underscore -->
    <script type="text/javascript" src="/libs/vendor/underscore/underscore-min.js"></script>
    <!-- JS: Plugins > Backbone -->
    <script type="text/javascript" src="/libs/vendor/backbone/backbone-min.js"></script>
    <!-- JS: Plugins > jQuery -->
    <script type="text/javascript" src="/libs/vendor/jquery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/libs/vendor/jquery/jquery.easing-1.3.pack.js"></script>
    <!-- JS: Plugins > Fancybox -->
    <script type="text/javascript" src="/libs/vendor/fancybox/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/libs/vendor/fancybox/js/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript" src="/libs/vendor/fancybox/js/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="/libs/vendor/fancybox/js/jquery.fancybox-media.js"></script>
    <!-- JS: Plugins > BX Slider -->
    <script type="text/javascript" src="/libs/vendor/bx-slider/js/jquery.bx-slider.min.js"></script>
    <!-- JS: Plugins > Google Map API -->
    <script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAyhw8QDDthUf_-P5XBMKY2RRaLhBCYEQ2HxwDcACoBDSJCmxiJxT8pCzmBKczuPZyjKWzlTFd-Idi6A"></script>
    <!-- JS: Plugins > Bootstrap -->
    <script type="text/javascript" src="/libs/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- JS: Custom Scripts -->
    <script type="text/javascript" src="/libs/js/baralaye.namespace.js"></script>
    <script type="text/javascript" src="/libs/js/baralaye.plugins.js"></script>
    <script type="text/javascript" src="/libs/js/baralaye.template.js"></script>
    <script type="text/javascript" src="/libs/js/baralaye.catalog.js"></script>
    <script type="text/javascript" src="/libs/js/baralaye.pages.js"></script>
    <script type="text/javascript" src="/libs/js/baralaye.site.js"></script>

    <!-- JS: Plugins > Cloud Zoom -->
    <script type="text/javascript" src="/libs/vendor/cloud-zoom/js/jquery.cloud-zoom.1.0.2.min.js"></script>

    <!-- JS: Plugins Typekit -->
    <script type="text/javascript" src="http://use.typekit.com/pro5kts.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <!-- JS: Pinterest (for pin button) -->
    <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
  </head>
  <body>
    <?= $analytics; ?>
    <?= $vendor; ?>
    <div id="tmp-window" class="tmp-window">
      <div id="tmp-wrap" class="tmp-wrap">
        <div id="tmp-top" class="tmp-top">
          <div class="tmp-logo">
            <a href="/"><?= $logo; ?></a>
          </div>
          <div class="tmp-nav">
            <?= $menu; ?>
          </div>
        </div>
        <div id="tmp-sub" class="tmp-sub">
          <?= $content; ?>
        </div>
        <div id="tmp-bottom" class="tmp-bottom">
          <div class="tmp-nav">
            <?= $menu; ?>
          </div>
          <div id="google_translate_element" class="tmp-google-translate"></div>
        </div>
      </div>
    </div>
  </body>
</html>
