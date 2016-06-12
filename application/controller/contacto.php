<?php
class Contacto extends Controller
{
    public function index()
    {       
        $this->view->addData(['titulo' => 'Contacto | Padel GO!']);

       	echo $this->view->render("contacto/index"); // Imprime la vista
                
    } 

}
