<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Post;

/**
 * Post controller
 */
class PostController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $arr = Post::getAll();
        View::renderTemplate('Post/index.html', [
            'data' => $arr
        ]);
    }

    public function createPageAction()
    {
        View::renderTemplate('Post/createform.html', []);
    }

    public function createAction()
    {
        
        if ($this->request->submit) {
            $status = false;
            $message = 'Unable To Create';
            $title = filter_var($this->request->title, FILTER_SANITIZE_STRING);
            $description = filter_var($this->request->description, FILTER_SANITIZE_STRING);
            $arr = [
                'title' => $title,
                'description' => $description
            ];
            $query = Post::createPost($arr);
            
            if ($query) {
                $status = true;
                $message = 'Successfully Created';
            } 
            $data = [
                'status' => $status,
                'msg' => $message
            ];
            echo json_encode($data);
            exit;
        }
        

        // $query = Post::create($arr);

    }
}