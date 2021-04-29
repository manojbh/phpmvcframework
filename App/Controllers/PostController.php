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
        //print_r($this->request);exit;
        $id = $this->request->id;
        $data = [];
        
        if($id) {
            $post = Post::get(['id'=>$id]);
            $data['data'] = $post;
        }
        View::renderTemplate('Post/form.html', $data);
    }

    public function updatePageAction()
    {
        $id = $this->request->id;
        
        $data = Post::get(['id'=>$id]);
        View::renderTemplate('Post/form.html', [
            'data' => $data
        ]);
    }

    public function createAction()
    {
        
        if ($this->request->submit) {
            $status = false;
            $message = 'Unable To Create/Update';
            $title = filter_var($this->request->title, FILTER_SANITIZE_STRING);
            $description = filter_var($this->request->description, FILTER_SANITIZE_STRING);
            $id = $this->request->id;

            $arr = [
                'title' => $title,
                'description' => $description
            ];

            if ($id) {
                $query = Post::updatePost(['id'=>$id], $arr);
                $message = 'Updated';
            } else {
                $query = Post::createPost($arr);
                $message = 'Created';
            }
            
            
            if ($query) {
                $status = true;
                $message = "Successfully {$message}";
            } else {
                $status = false;
                $message = "Unable to {$message}";
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