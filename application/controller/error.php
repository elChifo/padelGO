<?php

class Error extends Controller
{
    private $error;

    public function __construct($error = ""){
        parent::__construct();
        $this->error = $error;
    }

    public function index()
    {        
        $this->view->addData(['titulo' => 'Padel GO!']);
        
        echo $this->view->render('error/index', array(
            'error' => $this->error
        ));
    }
}
