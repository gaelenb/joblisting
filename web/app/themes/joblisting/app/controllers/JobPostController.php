<?php

namespace Controllers;

use Models\JobPost;

Class JobPostController {
    private $post_id;

    function __construct($post_id=null) {
        $this->post_id = $post_id;
    }

    /**
     * Jobs Post listing page view data.
     *
     * @return array
     */
    public function index() {
        $posts = JobPost::getAll();

        $job_locations = array_filter(array_unique(array_map(function($job) {
            return $job->location;
        }, $posts)));
        $job_categories = array_filter(array_unique(array_map(function($job) {
            return $job->category;
        }, $posts)));

        return [
            'job_posts' => $posts,
            'job_locations' => $job_locations,
            'job_categories'=> $job_categories,

        ];
    }

    /**
     * Jobs Post singles page view data.
     *
     * @return Array
     */
    public function show() {
        $job_post = new JobPost($this->post_id);

        return [
            'job_post' => $job_post
        ];
    }

    /**
     * create a new job post.
     *
     * @return Array
     */
    public function create() {
        
        return [
            //
        ];
    }
}
