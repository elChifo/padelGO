<?php

class Error extends Controller
{   
    public function index()
    {        
        $this->view->addData(['titulo' => 'Error | Padel GO!']);
        
        echo $this->view->render('error/index', [ // Imprime la vista y añade datos
            'error' => $error
        ]);
    }
}
