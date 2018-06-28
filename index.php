<?php
    /** minimal ab testing project
     * run it with the following command
     * $ php -S localhost:8080
     * then go to localhost:8080 to visit the site
     **/
?>
<html>
    <head>
        <style>.async-hide { opacity: 0 !important} </style>
        <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
                h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
                (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
            })(window,document.documentElement,'async-hide','dataLayer',4000,
                {'GTM-TFFRRV6':true});</script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-121562509-1', 'auto');
            ga('require', 'GTM-TFFRRV6');
            ga('send', 'pageview');
        </script>
        <title>Greg Test</title>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121562509-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-121562509-1');
        </script>
    </head>

    <body>
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
