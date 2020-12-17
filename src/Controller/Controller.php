<?php

declare(strict_types=1);
namespace App\Controller;

use App\View;
use App\Model\Model;

class Controller
{
    private array $get ;
    private array $post;
    private View $view;
    private Model $model;
    public function __construct(array $data)
    {
        $this->get =$data['get'];
        $this->post =$data['post'];
        $this->view = new View();
        $this->model = new Model();
        $this->showPage();
    }
    public function showPage():void
    {
        switch ($this->get["action"] ?? "login") {
            case "login":
                $this->view->render("login");
            break;
            case "validateLogin":
                $this->model->validateLogin($this->post);
            break;
            case "userPanel":
                $this->view->render("userPanel");
            break;
            case "logoutUser":
                $this->model->logoutUser();
            break;
            default:
                $this->view->render("login");
            break;

        }
    }
}

//konto1 hasło