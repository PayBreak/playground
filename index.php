<?php
    /** minimal ab testing project
     * run it with the following command
     * $ php -S localhost:8080
     * then go to localhost:8080 to visit the site
     **/

require_once('./vendor/autoload.php');

$ttl = 86400; // in seconds
$adapter = new \PhpAb\Storage\Adapter\Cookie('phpab', $ttl);
$storage = new \PhpAb\Storage\Storage($adapter);
$participationManager = new \PhpAb\Participation\Manager($storage);

$analyticsData = new \PhpAb\Analytics\DataCollector\Google();

$dispatcher = new \PhpAb\Event\Dispatcher();
$dispatcher->addSubscriber($analyticsData);

$filter = new \PhpAb\Participation\Filter\Percentage(50);

$chooser = new \PhpAb\Variant\Chooser\RandomChooser();

$engine = new \PhpAb\Engine\Engine($participationManager, $dispatcher, $filter, $chooser);

$test = new \PhpAb\Test\Test(
    'First Experiment',
    [
        new PhpAb\Variant\SimpleVariant('Control'),
        new PhpAb\Variant\CallbackVariant('Different layout 1', function () {
            die('This is the alternative variant speaking. YEABOIIII');
            // push stuff into seassions?
        }),
    ],
    [
        \PhpAb\Analytics\DataCollector\Google::EXPERIMENT_ID => 'vstptpKtRaSQNPSlbeQpBw'
    ]
);


try {
    $engine->addTest($test);
    $engine->start();
    $engine->getTest('First Experiment');
} catch (\Exception $e) {
    echo '<h1>The engine went bust:</h1>';
    var_dump($e->getMessage());
    die();
}

$dispatcher->dispatch('Page visited', []);

$analytics = new \PhpAb\Analytics\Renderer\Google\GoogleUniversalAnalytics($analyticsData->getTestsData());

?>
<html>
    <head>
        <style>.async-hide { opacity: 0 !important} </style>
        <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
                h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
                (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
            })(window,document.documentElement,'async-hide','dataLayer',4000,
                {'GTM-M63T3NR':true});
        </script>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-M63T3NR');</script>
        <!-- End Google Tag Manager -->


        <title>Greg Test</title>
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M63T3NR"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <pre><?php echo $analytics->getScript(); ?></pre>
        <h1>Greg Test</h1>
        <h2>send me stuff</h2>
        <form>
            <label>
                stuff
                <input type="text" name="stuff">
                <input type="submit">
            </label>
        </form>

        <pre><?php var_export($_GET); ?></pre>
    </body>
</html>
