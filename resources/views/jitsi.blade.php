<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/Estilos.css')}}" />
    <script src='https://8x8.vc/libs/external_api.min.js'></script>
    {{-- <script src='https://8x8.vc/external_api.js' async></script> --}}
    

   


    <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if ($pagina == 'invitados' || $pagina == 'index') {
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if ($pagina == 'conferencia') {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
    ?>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Oswald:wght@300;400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#fafafa">
    <script src="https://kit.fontawesome.com/1a2bd5a108.js" crossorigin="anonymous"></script>




</head>

<body class="<?php echo $pagina ?>">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </nav>
                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i> 01-02 Julio</p>
                        <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i> Huancayo, Perú</p>
                    </div>

                    <h1 class="nombre-sitio">App Congreso</h1>
                    <p class="slogan">Los mejores congresos de <span>Ingeniería</span></p>
                </div>
                <!--.informacion-evento-->

            </div>
        </div>
        <!--.hero-->
    </header>

    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="/">
                    <img src="img/logo.svg" alt="logo del app congreso">
                </a>
            </div>

            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="{{route('catalogo')}}">Conferencia</a>
                <a href="{{route('calendario')}}">Calendario</a>
                <a href="{{route('invitados')}}">Invitados</a>
                <a href="{{route('registrar')}}">Registrarse</a>
                <a href="{{route('usuario.login')}}">Iniciar sesion</a>
            </nav>
        </div>
        <!--.contenedor-->
    </div>
    <!--.barra-->



    <div class="meet-container">

        <div id="meet" class="meet-body"></div>

        <script>
        
            const domain = '8x8.vc';
            const options = {
                roomName: 'vpaas-magic-cookie-7ae1fe3f898449ef82ec67cded0ac6f5/AndreiMeet',
                parentNode: document.querySelector('#meet'),
                jwt: "\eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtN2FlMWZlM2Y4OTg0NDllZjgyZWM2N2NkZWQwYWM2ZjUvZDBjYTI2IiwidHlwIjoiSldUIiwiYWxnIjoiUlMyNTYifQ.eyJhdWQiOiJqaXRzaSIsImNvbnRleHQiOnsidXNlciI6eyJpZCI6IjBmOGI3NzYwLWMxN2YtNGExMi1iMTM0LWM2YWMzNzE2NzE0NCIsIm5hbWUiOiJBbmRyZWkgU2FhdmVkcmEiLCJhdmF0YXIiOiJodHRwczovL2xpbmsudG8vdXNlci9hdmF0YXIvcGljdHVyZSIsImVtYWlsIjoiNzM0NTUwNzNAY29udGluZW50YWwuZWR1LnBlIiwibW9kZXJhdG9yIjoidHJ1ZSJ9LCJmZWF0dXJlcyI6eyJsaXZlc3RyZWFtaW5nIjoidHJ1ZSIsInJlY29yZGluZyI6InRydWUifX0sImV4cCI6MTY5NjI4NDA1MiwiaXNzIjoiY2hhdCIsIm5iZiI6MTU5NjE5NzY1Miwicm9vbSI6IioiLCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtN2FlMWZlM2Y4OTg0NDllZjgyZWM2N2NkZWQwYWM2ZjUifQ.tHYgtlk8GfS76ykpSCK-GruyqvG8OCCZ3Jx3uUt4AnOoOqSGg-Gui3epklYrhqbxErmrG3wcXTsmqGhb94CMcj417QuxWiq8vpiGaM1sOf7D_b1oY7TiEW69JNBGbo8RHFY76hGwrVNRm2VuJJblNwobTJvmiv-6AqgUixeMwgaDwysKhb5pF7aR53ioMJQS4dNTrPSnWSQ_6VZnR-shhv5MhHKmz6O_U6SwKLxtfEM9NKeEofX3bHJ0Njuni59hWtRV_fOAwry7SrUItOfptrink6MzAFP4a5TGP2qV6FAMNBoLqXiBefrThvZGmDV5jP8YV8dM7dBPuldBHXq6DOxtdC0Xr6sc32CO5d-u4qM2ByYHmUP6-eiwm7tuVE-I14QJbmL8v0O_kHiFMTghp4Jx0M9c6SbY5Jqn_L-p2NbrE5AbAmft6h2jRfGg2UdUnNNk7EVrOm_wHCW3p9hMoJzzSLTJnhyS39fisKd1Jiq5_IAu_bTnA5BFVRjGTRiTuLHylxTG_N-Da238XBVjwyc4j4Csg3Ftc2LYSiE2ZABB8fncWuZZiscaenusj8XfDAxuFh3RTxA7PaKDEpJ_7hIU0xNj4BNLhpoR-3exAI2v36cEQLNwpVdxBz1sg4zBSlZY0cgC8zvLrtHDGVwSuOQsxv4fPs61ls-bAv8I5Po",
            };

            const api = new JitsiMeetExternalAPI(domain, options);

            
            window.onload = () => {
                initIframeAPI();
            };


        </script>

    </div>



<footer class="site-footer">
    <div class="contenedor clearfix">
        <div class="footer-informacion">
            <h3>Sobre <span>gdlwebcamp</span></h3>
            <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex
                blandit vehicula. Morbi porttitor tempus euismod.</p>
        </div>
        <div class="ultimos-tweets">
            <h3>Últimos <span>tweets</span></h3>
            <a class="twitter-timeline" data-height="400" data-theme="light" data-link-color="#fe4918" Tweets by </a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="menu">
            <h3>Redes <span>sociales</span></h3>
            <nav class="redes-sociales">
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </nav>
        </div>
    </div>

    <p class="copyright">
        Todos los derechos Reservados GDLWEBCAMP 2021.
    </p>



    <!-- Begin MailChimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup {
            background: #fff;
            clear: left;
            font: 14px Helvetica, Arial, sans-serif;
        }

        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
         We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div style="display:none;">
        <div id="mc_embed_signup">
            <form action="//easy-webdev.us11.list-manage.com/subscribe/post?u=b3bb37039b6fbf3db0c1a8331&amp;id=20463b69f2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <h2>Suscribete al Newsletter y no te pierdas nada de este evento</h2>
                    <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
                    <div class="mc-field-group">
                        <label for="mce-EMAIL">Correo Electrónico <span class="asterisk">*</span>
                        </label>
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b3bb37039b6fbf3db0c1a8331_20463b69f2" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
        <script type='text/javascript'>
            (function($) {
                window.fnames = new Array();
                window.ftypes = new Array();
                fnames[0] = 'EMAIL';
                ftypes[0] = 'email';
                fnames[1] = 'FNAME';
                ftypes[1] = 'text';
                fnames[2] = 'LNAME';
                ftypes[2] = 'text';
            }(jQuery));
            var $mcj = jQuery.noConflict(true);
        </script>
        <!--End mc_embed_signup-->
    </div>
</footer>



<script src="{{asset('js/vendor/modernizr-3.8.0.min.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    (window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>'))
</script>


<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace(".php", "", $archivo);
if ($pagina == 'invitados' || $pagina == 'index') {
    echo '<script src="js/jquery.colorbox-min.js"></script>';
} else if ($pagina == 'conferencia') {
    echo '<script src="js/lightbox.js"></script>';
}
?>

<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>



<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>