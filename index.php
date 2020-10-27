<?php
session_start();
include 'php/sesion/validar-index.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="img/logo_utp.png">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/home.css">
    <title>Clínica Universitaria</title>
</head>

<body>
    <?php require 'php/index-php/nav-index.php' ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="5000">
                <img src="img/banner-index.jpg" class="d-block w-100" alt="Clinica-universitaria" id="img">
                    <p>Agendar tu cita es más fácil.</p>
            </div>
            <div class="carousel-item" data-interval="5000">
                <img src="img/clinica-mejor.jpeg" class="d-block w-100" alt="Clinica-universitaria" id="img">
                    <p>Clínica Universitaria, Universidad Tecnológica de Panamá.</p>
            </div>
            <div class="carousel-item" data-interval="5000">
                <img src="img/clinica_ubicacion.jpg" class="d-block w-100" alt="Clinica-universitaria" id="img">
                    <p>Avenida Ricardo J. Alfaro, Campus Metropolitano Dr. Víctor Levi Sasso, Edificio
                        Administrativo.</p>
            </div>
        </div>
        <a id="prev" class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a id="next" class="carousel-control-next" href="#carouselExampleCaptions" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <h2>Servicios que ofrecemos:</h2>
        <div class="row">
            <div class="col-sm mb-5">
                <div class="card" style="width: 100%">
                    <img src="img/consulta-medica.jpg" class="card-img-top" alt="..." width="200px" height="200px">
                    <div class="card-body">
                        <p class="card-text">Consultas y evaluaciones medicas.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-5">
                <div class="card" style="width: 100%">
                    <img src="img/buena-salud.jpg" class="card-img-top" alt="..." width="200px" height="200px">
                    <div class="card-body">
                        <p class="card-text">Certificado de buena salud.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-5">
                <div class="card" style="width: 100%">
                    <img src="img/inhaloterapia.jpg" class="card-img-top" alt="..." width="200px" height="200px">
                    <div class="card-body">
                        <p class="card-text">Inhaloterapias.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm mb-5">
                <div class="card" style="width: 100%">
                    <img src="img/inyectables.png" class="card-img-top" alt="..." width="200px" height="200px">
                    <div class="card-body">
                        <p class="card-text">Aplicación de medicamentos inyectables.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-5">
                <div class="card" style="width: 100%">
                    <img src="img/curaciones.jpg" class="card-img-top" alt="..." width="200px" height="200px">
                    <div class="card-body">
                        <p class="card-text">Curaciones y corte de puntos.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 100%">
                    <img src="img/peso-talla.jpg" class="card-img-top" alt="..." width="200px" height="200px">
                    <div class="card-body">
                        <p class="card-text">Control de peso y talla.</p>
                    </div>
                </div>
            </div>
        </div>
        <h2>Conoce más sobre la Clínica Universitaria:</h2>
        <div class="accordion mb-5" id="accordionExample">
            <div class="card">
                <div class="card-header" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                    <h4 class="mb-0">
                        Clínica Universitaria
                    </h4>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        La Clínica Universitaria brinda servicios de salud y lleva a cabo actividades clínicas y de
                        capacitación en temas de salud, dirigidas a la población estudiantil, docente, administrativa y
                        de investigación de la Universidad.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo" id="headingTwo">
                    <h4 class="mb-0">
                        Objetivos
                    </h4>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>Proporcionar al paciente servicios de atención integral para su salud, en lo
                                concerniente a prevención, tratamiento y rehabilitación de enfermedades.</li>
                            <li>Desarrollar actividades inherentes a la promoción de la salud de la comunidad
                                universitaria.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree" id="headingThree">
                    <h4 class="mb-0">
                        Funciones
                    </h4>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>Asistir con atención médica a los estudiantes, docentes, investigadores y personal
                                administrativo de la Universidad.</li>
                            <li>Orientar a pacientes acerca de su enfermedad, tratamiento, medicamento y efectos
                                secundarios.</li>
                            <li>Dar atención primaria (preventiva) en salud e higiene a través de acciones de
                                capacitación sobre diferentes patologías infectocontagiosas u otras enfermedades.</li>
                            <li>Realizar un plan anual de trabajo para desarrollar mejores niveles de atención en la
                                clínica.</li>
                            <li>Referir los pacientes que lo ameriten, según sea el caso, a análisis clínicos, de
                                laboratorio y a otros especialistas.</li>
                            <li>Coordinar con la Dirección de Orientación Psicológica para establecer referencias para
                                la atención psicológica de usuarios de la clínica.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingFour" type="button" data-toggle="collapse"
                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h4 class="mb-0">
                        Servicios Ofertados
                    </h4>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>Consultas y evaluaciones medicas con previa cita.</li>
                            <li>Consultas y evaluaciones de urgencias.</li>
                            <li>Referencias a especialidades médicas.</li>
                            <li>Certificado de buena salud.</li>
                            <li>Solicitudes de estudios de gabinete.</li>
                            <li>Administración gratuita de medicamentos básicos.</li>
                            <li>Curaciones y corte de puntos.</li>
                            <li>Control de peso y talla.</li>
                            <li>Control de presión arterial.</li>
                            <li>Inhaloterapias.</li>
                            <li>Aplicación de medicamentos inyectables.</li>
                            <li>Toma de glicemia capilar.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive text-center my-4">Contáctanos</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5"></p>

            <div class="row justify-content-center">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-4">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.478803914558!2d-79.53496485016481!3d9.020011391582784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca83f2ef676e5%3A0x210e42b715ec286f!2sVicerrector%C3%ADa%20Administrativa%20Universidad%20Tecnol%C3%B3gica%20de%20Panam%C3%A1!5e0!3m2!1ses!2spa!4v1572377582358!5m2!1ses!2spa"
                            width="600" height="1000" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        <!--img src="img/mapa-clinica.jpg" class="card-img-top" alt="..." width="600px" height="600px"-->
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Avenida Ricardo J. Alfaro, Campus Metropolitano Dr. Víctor Levi Sasso, Edificio
                                Administrativo.</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>(507) 560-3205</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>nilka.arosemena@utp.ac.pa </p>
                        </li>
                        <li><i class="fas fa-users mt-4 fa-2x"></i>
                            <p>Dra. Nilka Arosemena, Médico General. </p>
                        </li>
                        <li><i class="fas fa-clock mt-4 fa-2x"></i></i>
                            <p>Lunes a viernes 8:00 a.m. a 4:00 p.m.</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->
    </div>
    <script src="css/bootstrap-4.3.1-dist/js/jquery/popper.min.js"></script>
    <script src="css/bootstrap-4.3.1-dist/js/jquery/jquery-3.4.1.min.js"></script>
    <script src="css/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <?php require 'php/index-php/footer-index.php' ?>
</body>

</html>