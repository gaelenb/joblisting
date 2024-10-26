<?php

namespace Models;

use Models\ACFModel;

Class JobPost extends ACFModel {
    public $id;
    public $title;
    public $category;
    public $permalink;
    public $date_created;
    public $salary;
    public $employment_type;
    public $experience_level;
    public $company;
    public $location;

    const POST_TYPE = 'post';

    function __construct($post_id) {
        $this->id = $post_id;
        $this->title = $this->get_title();
        $this->date_created = $this->get_date_created();
        $this->permalink = $this->get_permalink();
        $this->category = $this->get_category();
        $this->salary = get_field('salary', $this->id);
        $this->employment_type = get_field('employment_type', $this->id);
        $this->experience_level = get_field('experience_level', $this->id);
        $this->company = get_field('company', $this->id);
        $this->location = get_field('location', $this->id);
    }

    /**
     * Retrieve all job posts.
     *
     * @return array An array of JobPost objects.
     */
    public static function getAll() {
        $posts = get_posts([
            'post_type' => static::POST_TYPE,
            'post_status' => 'publish',
            'numberposts' => -1
        ]);

        return array_map(function($post) {
            return new Self($post->ID);
        }, $posts);
    }

    /**
     * Get a filtered list of job posts.
     *
     * @param array $filters
     * @return array An array of JobPost objects.
     */
    public static function getResults(Array $filters) {
        $args = array(
            'posts_per_page'    => -1,
            'post_type'     => static::POST_TYPE,
            'post_status'   => 'publish',
        );
        if ($filters['keyword'] !== "")    $args['s']             = $filters['keyword'];
        if ($filters['category'] !== "-1") $args['category_name'] = $filters['category'];
        if ($filters['location'] !== "-1") $args['meta_query']    = [
            array(
                'key'       => 'location',
                'value'     => $filters['location'],
                'compare'   => '='
            )];

        $posts = get_posts($args);
        return array_map(function($post) {
            return new Self($post->ID);
        }, $posts);
    }

    /**
     * Determine user permissions
     *
     * @return boolean whether or not user can access
     */
    public function user_can_access() {
        return true;
    }
}
