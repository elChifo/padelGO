<?php
class Contacto extends Controller
{
    public function index()
    {       
        $this->view->addData(['titulo' => 'Contacto']);
        echo $this->view->render("contacto/index");        
                
    } 

}
