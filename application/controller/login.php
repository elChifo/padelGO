<?php

class Login extends Controller
{
    public function index()    
    {
        $this->view->addData(['titulo' => 'Padel GO!']);    

        echo $this->view->render('login/index');
    }

    public function logueado()
    {
        $this->view->addData(['titulo' => 'Padel GO!']);
       
        if(LoginModel::logueado($_POST)) {

            $privado = LoginModel::logueado($_POST);

            if($privado == 'admin@admin.com') {

                    echo $this->view->render('login/privado', [
                        'privado' => $privado
                    ]);
            }    
            else {                    
                    echo $this->view->render('login/logueado', [
                        'privado' => $privado
                    ]);
            }
        } 

        else {
            echo $this->view->render('login/index');
        }
        
    }

    public function salir()
    {
        Session::destroy();
        header('location: /');
        exit();
    }

    public static function espacio($num)
    {       
        for ($i=0; $i<$num; $i++) {
            echo '&nbsp;';
        }
    }

     
}