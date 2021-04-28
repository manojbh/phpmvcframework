<?php

namespace App\Controllers;

use \Core\View;

/**
 * Welcome controller
 */
class Welcome extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $arr = [
            'title' => 'Welcome',
            'data' => [
                'name' => 'PHP FRAMEWORK',
            ]
            ];
        View::renderTemplate('Welcome/index.html', $arr);
    }
}