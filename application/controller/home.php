<?php

class Home extends Controller
{
    public function index()
    {
        $this->view->addData(['titulo' => 'Inicio',

        				'presentacion' => "'PADEL GO!' es una web que te permite acceder a una innovadora red social de jugadores de padel, desde tu móvil, y de una forma sencilla e intuitiva, Podrás:

                                <ul> 
                                    <li>Crear y apuntarte a Partidos</li>
                                    <li>Restringir acceso a los partidos por nivel</li>
                                    <li>Votar nivel de otros jugadores</li>
                                    <li>Gestionar agenda de jugadores</li>
                                    <li>Dar de alta clubs y acceder a su información</li>
                                    <li>Gestionar tus datos del perfil</li>
                                    <li>y mucho más por llegar....</li>
                                </ul>",

        				'objetivos' => "A todos nos gusta progresar en la práctica de nuestro deporte, y si tenemos un buen profesor, mejor que mejor.",

        				'desarrollo' => "'PADEL GO!' ofrece infinitas posibilidades: podemos tomárnoslo con calma y simplemente buscar un poco de ejercicio físico durante la semana, o bien mucho más en serio y querer competir seriamente.",

                        'quienessomos' => "El equipo de 'PADEL GO!' esta integrado por un grupo humano con amplia experiencia en todos los  ámbitos referentes al mundo del pádel.
                        <br /> <br /> 
                            Nos encargaremos de que tu experiencia tanto en el juego, como en la interación con los usuarios sea lo más agradable posible.
                        <br /> <br /> 
                            Para cualquier duda o sugerencia puedes ponerte en contacto con nosotros en la sección de contacto."
        ]);

        echo $this->view->render("home/index"); 
    } 


    public function cookies()
    {
        $this->view->addData(['titulo' => 'Cookies']);

        echo $this->view->render('home/cookies');
    }

    public function privacidad()
    {
        $this->view->addData(['titulo' => 'Privacidad']);

        echo $this->view->render('home/privacidad');
    }

    public function faq()
    {
        $this->view->addData(['titulo' => 'Faq']);

        echo $this->view->render('home/faq');
    }




}
