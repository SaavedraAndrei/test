<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icono -->
    <link rel="icon" href="{{asset('/icon.png')}}" type="image/png" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />


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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('status'))
      <script>
          Swal.fire({
          position: 'top-center',
          icon: 'success',
          title: 'Gracias! El pago se ha realizado correctamente',
          showConfirmButton: false,
          timer: 2500
          });
      </script>
  @endif

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="https://www.facebook.com/IEP-Uni%C3%B3n-Latino-Huancayo-100585138110712/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/user/ColegioUNION" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </ul>
                </nav>
                

            </div>
        </div>
        <!--.hero-->
    </header>


    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a class="quitar" href="{{route('prin.welcome')}}">
                    <p class="logo-pagprin">I.E.P. UNIÓN LATINO</p>
                </a>
            </div>

            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="{{route('calendario')}}">Calendario</a>
                <a href="{{route('invitados')}}">Invitados</a>
                <a href="{{route('registrar')}}">Registrarse</a>
                <a href="{{route('usuario.login')}}">Iniciar sesion</a>
            </nav>
        </div>
        <!--.contenedor-->
    </div>
    <!--.barra-->


    <section class="seccion contenedor">
        <h2>Acerca del Colegio</h2>
        <p class="descrip">
            La Institución Educativa, fue Fundada el 30 de abril de 1919 con el nombre de “Escuela Industrial”, funcionando originalmente en una casa alquilada en el distrito de Miraflores, Lima.
            Siendo la inspección de educación de la municipalidad de Lima quien ratifico su funcionamiento según resolución Directoral N° 93-02-05-1924 del 20 de marzo 1924 como escuela para enseñanza secundaria, en 1941.
        </p>
        <p>
            
        </p>
    </section>
    <!--seccion-->


    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogg">
            </video>
        </div>
        <!--.contenedor-video-->
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del Evento</h2>

                    <nav class="menu-programa">
                        <a href="#seminario">
                            <i class="fa fa-university" aria-hidden="true"></i> Conferencias </a>
                        <a href="#conferencias">
                            <i class="fa fa-comment" aria-hidden="true"></i> Capacitaciones </a>
                        <a href="#talleres">
                            <i class="fa fa-user-graduate" aria-hidden="true"></i> Charlas </a>

                    </nav>


                    <div id="seminario" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>El poder de los hábitos familiares en el talento y rendimiento</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 10:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i>Cesar Luis Lino Rosado</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Educar en el uso saludable de las tecnologías</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 19:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-10</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i>Pedro Raul Rosado Nuñez</p>
                        </div>
                        <a href="{{route('calendario')}}" class="button float-right">Ver todos</a>
                    </div>
                    <!--#talleres-->

                    <div id="conferencias" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>¿Podemos cambiar la educación?</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 10:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i>Juan Jose Sánchez Aliaga</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Re-educar: el lugar del profesor</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 05:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i>Freddy Antonio Poma Rivera</p>
                        </div>
                        <a href="{{route('catalogo')}}" class="button float-right">Ver todos</a>
                    </div>
                    <!--#talleres-->

                    <div id="talleres" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>El rol de los maestros en la innovación educativa</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 02:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i>Harold Arnold García Montes</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Los nuevos retos de la educación</h3>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 19:00:00</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> 2016-12-09</p>
                            <p><i class="fa fa-user" aria-hidden="true"></i>Álvaro Daniel Solis Serazo</p>
                        </div>
                        <a href="{{route('catalogo')}}" class="button float-right">Ver todos</a>
                    </div>
                    <!--#talleres-->

                </div>
                <!--.programa-evento-->
            </div>
            <!--.contenedor-->
        </div>
        <!--.contenido-programa-->
    </section>
    <!--.programa-->

    <section class="invitados contenedor seccion">
        <h2>Nuestros Ponentes</h2>
        <ul class="lista-invitados clearfix">


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado1">
                        <img src="/img/ponentes/invitado1.jpg" alt="Imagen invitado">
                        <p>Cesar Luis Lino Rosado</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado1">
                    <h2>Cesar Luis Lino Rosado</h2>
                    <img src="img/ponentes/invitado1.jpg" alt="">
                    <p>- Director de la I.E.P. Andrés Bello</p>
                    <p>- Magister en Educación</p>
                    <p>- 15 Años de Experiencia en Educación</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado2">
                        <img src="/img/ponentes/invitado2.jpg" alt="Imagen invitado">
                        <p>Pedro Raul Rosado Nuñez</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado2">
                    <h2>Pedro Raul Rosado Nuñez</h2>
                    <img src="img/ponentes/invitado2.jpg" alt="">
                    <p>- Coordinador general de la I.E.P. Unión Latino</p>
                    <p>- Magister en Educación</p>
                    <p>- 20 Años de Experiencia en Educación</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado3">
                        <img src="/img/ponentes/invitado3.jpg" alt="Imagen invitado">
                        <p>Juan Jose Sánchez Aliaga</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado3">
                    <h2>Juan Jose Sánchez Aliaga</h2>
                    <img src="img/ponentes/invitado3.jpg" alt="">
                    <p>- Docente de la I.E.P. Unión Latino</p>
                    <p>- Magister en Educación</p>
                    <p>- 10 Años de Experiencia en Educación</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado4">
                        <img src="/img/ponentes/invitado4.jpg" alt="Imagen invitado">
                        <p>Freddy Antonio Poma Rivera</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado4">
                    <h2>Freddy Antonio Poma Rivera</h2>
                    <img src="img/ponentes/invitado4.jpg" alt="">
                    <p>- Docente de la I.E.P. Unión Latino</p>
                    <p>- Magister en Educación</p>
                    <p>- 13 Años de Experiencia en Educación</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado5">
                        <img src="/img/ponentes/invitado5.jpg" alt="Imagen invitado">
                        <p>Harold Arnold García Montes</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado5">
                    <h2>Harold Arnold García Montes</h2>
                    <img src="img/ponentes/invitado5.jpg" alt="">
                    <p>- Docente de la I.E.P. Ingeniería</p>
                    <p>- Magister en Educación y Experto en educación secundaria</p>
                    <p>- 9 Años de Experiencia en Educación</p>
                </div>

            </div>


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado6">
                        <img src="/img/ponentes/invitado6.jpg" alt="Imagen invitado">
                        <p>Álvaro Daniel Solis Serazo</p>
                    </a>
                </div>
                <!-- END .invitado -->
            </li>

            <div style="display:none;">

                <div class="invitado-info" id="invitado6">
                    <h2>Álvaro Daniel Solis Serazo</h2>
                    <img src="img/ponentes/invitado6.jpg" alt="">
                    <p>- Docente de la Universidad Peruana de los Andes</p>
                    <p>- Ingeniero Industrial</p>
                    <p>- 3 Años de Experiencia en Educación</p>
                </div>

            </div>


        </ul>
        <!-- END lista-invitados -->
    </section>
    <!-- END .invitados -->


    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero">0</p> Invitados
                </li>
                <li>
                    <p class="numero">0</p> Talleres
                </li>
                <li>
                    <p class="numero">0</p> Días
                </li>
                <li>
                    <p class="numero">0</p> Conferencias
                </li>

            </ul>
        </div>
    </div>

 
    <section class="precios seccion">
    <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pago General de las Conferencias</h3>
                        <p class="numero">S/. 50</p>
                        <ul>
                            <li>Inicio: 22-11-2021</li>
                            <li>Fin: 26-11-2021</li>
                            <!-- <li>Todos los talleres</li> -->
                        </ul>
                        <a href="#" class="button">Comprar</a>
                        <!-- <a href="{{url('/paypal/pay')}}" class="button">Comprar</a> -->
                    </div>
                </li>
            </ul>
        </div>
    </section>


    <div id="mapa" class="mapa"></div>


    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>
                        La plataforma permitió de una forma facil
                        que las conferencias y capacitaciones brindadas 
                        para el colegio estén organizadas correctamente lo cual
                        favoreció con la participación de más docentes y alumnos.
                    <p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial1.jpg" alt="imagen testimonial">
                        <cite>Clara Marisol Ramirez Prado<span>Docente del Colegio Unión Latino</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>
                        La página web contribuyó en la continuidad de la enseñanza 
                        dentro del colegio. Lo cuál, promovió que los alumnos puedan obtener 
                        un certificado digital por cada conferencia a la que hayan asistido.
                    <p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial2.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Escobedo Damian<span>Docente del Colegio Unión Latino</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>
                        La plataforma brinda una información estructurada
                        que permite a los alumnos comprender los temas, horas y conocer a los ponentes 
                        que van a brindar la ponencia.
                    <p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial3.jpg" alt="imagen testimonial">
                        <cite>Juan Daniel Gamarra Canchucaja<span>Docente del Colegio Unión Latino</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
        </div>
    </section>




    

    <section class="seccion cuentareg">
        <h2>La próxima conferencia empieza en:</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p> días
                </li>
                <li>
                    <p id="horas" class="numero"></p> horas
                </li>
                <li>
                    <p id="minutos" class="numero"></p> minutos
                </li>
                <li>
                    <p id="segundos" class="numero"></p> segundos
                </li>
            </ul>
        </div>
    </section>

    <footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>la institución</span></h3>
                <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex
                    blandit vehicula. Morbi porttitor tempus euismod.</p>
            </div>
            <div class="ultimos proyectos">
                <h3>Últimos <span>tweets</span></h3>
                <a class="twitter-timeline" data-height="400" data-theme="light" data-link-color="#fe4918" Tweets by </a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="menu">
                <h3>Redes <span>sociales</span></h3>
                <nav class="redes-sociales">
                    <a href="https://www.facebook.com/IEP-Uni%C3%B3n-Latino-Huancayo-100585138110712/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/user/ColegioUNION" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </ul>
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