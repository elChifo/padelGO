<?php

class Home extends Controller
{
    public function index()
    {
        $this->view->addData(['titulo' => 'Inicio | Padel GO!',  // Añade datos a la vista

        				'presentacion' => "'PADEL GO!' es una aplicación web que te permite acceder a una innovadora red social de jugadores de pádel, desde tu ordenador o dispositivo móvil, y de una forma sencilla e intuitiva, Podrás:

                                <ul> 
                                    <li>Crear y apuntarte a Partidos.</li>
                                    <li>Disfrutar de las últimas noticias del mundo del pádel.</li>
                                    <li>Enviar y Recibir mensajes de otros usuarios.</li>
                                    <li>Ver los jugadores y monitores registrados.</li>
                                    <li>Dar de alta clubs y acceder a su información.</li>
                                    <li>Ver y publicar productos en nuestro mercadillo de 2ª Mano.</li>
                                    <li>Si eres monitor podrás anunciarte para que los usuarios puedan contactar contigo.</li>
                                    <li>Contactar con nosotros para ayudarnos a mejorar o comentarnos alguna incidencia.</li>
                                    <li>Gestionar tus datos de perfil.</li>
                                </ul>",

        				'objetivos' => "A todos nos gusta seguir progresando en la práctica de nuestro deporte favorito, y si tenemos un buen monitor, mejor que mejor. Por eso deberías de echarle un vistazo a nuestros Monitores Recomendados.",

        				'desarrollo' => "'PADEL GO!' nos ofrece infinitas posibilidades: podemos tomárnoslo con calma y simplemente buscar hacer un poco de ejercicio físico durante la semana, o bien apuntarnos a alguno de los torneos que publicaremos en nuestra sección \"Noticias\" para competir con jugadores de nuestro nivel.",

                        'quienessomos' => "El equipo de 'PADEL GO!' esta integrado por un grupo humano con amplia experiencia en todos los  ámbitos referentes al mundo del pádel.",

        ]);

        echo $this->view->render("home/index");  // Imprime la vista 
    } 


}
