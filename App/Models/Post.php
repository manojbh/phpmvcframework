<?php

namespace App\Models;

/**
 * Post model
 */
class Post extends \Core\Model
{

    /**
     * Get all the posts
     *
     * @return array
     */
    public static function getAll()
    {
        // $db = static::getDB();
        // $stmt = $db->query('SELECT id, title, description FROM posts');
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);

        return static::getInstance()->find('posts');
    }

    /**
     * Create post
     *
     * @return array
     */
    public static function createPost($request)
    {
        return static::getInstance()->insert('posts', $request);
        
    }

    /**
     * Update post
     *
     * @return array
     */
    public static function updatePost($condition, $fields)
    {
        return static::getInstance()->update('posts', $condition, $fields);
        
    }

    /**
     * Get filtered post
     *
     * @return array
     */
    public static function get($request)
    {
        return static::getInstance()->find('posts', $request);
        
    }
}