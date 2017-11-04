<?php

class MainController extends Controller
{

    public function main()
    {
        $this->loadView();
    }

    private function loadView(){
        include "view/header.php";
        include "view/footer.php";
    }
}