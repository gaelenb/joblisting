<template>
    <section class="job-listing">
        <job-search
            :job_locations="job_locations"
            :job_categories="job_categories"
            @search="search">
        </job-search>

        <div class="category-info">    
            <div class="row">

                <div class="col-md-3 col-sm-4">
                    <job-filters></job-filters>
                </div>

                <div class="col-sm-8 col-md-9 section">             
                    <job-display :job_posts="displayedJobPosts" :total_job_posts="totalJobPosts"></job-display>
                    <job-pagination></job-pagination>
                </div>

            </div>    
        </div>
    </section>
</template>

<script>
    export default {
        props: ['queried_job_posts'],
        data() {
            return {
                job_posts: [],
                job_locations: [],
                job_categories: [],
                page: 1,
                page_offset: 1,
                posts_per_page: 20,

            }
        },
        created() {
            this.job_posts = this.deepClone(this.queried_job_posts); // so we arent mutating a prop directly

            this.job_categories = [... new Set(
                    this.job_posts.map(job_post => job_post.category))
                ].filter(category => category);

            this.job_locations = [... new Set(
                    this.job_posts.map(job_post => job_post.location))
                ].filter(location => location);
        },
        computed: {
            pages() {
                return Math.ceil(this.job_posts / this.posts_per_page);
            },
            totalJobPosts() {
                return this.job_posts.length
            },
            // need to know how many job posts there are 
            // if it is greater than 20 we're going to paginate
            // start with the first 20 jobs in job_posts
            displayedJobPosts() {
                return this.job_posts.slice(this.page - 1, 20)
            }
        },
        methods: {
            search(filters) {
                $.ajax({
                    url: localized.resturl + '/jobpost/job-posts',
                    method: 'GET',
                    beforeSend: function(xhr){
                        xhr.setRequestHeader('X-WP-Nonce', localized.restnonce);
                    },
                    dataType: 'json',
                    data: { search: filters },
                    success: (result) => {
                        if (result.success) {
                            this.job_posts = result.data;
                        } else {

                            this.job_posts = result.data;
                        }
                    },
                    error: function(result) {
                        console.log('error')
                        console.log(result.data);
                    },
                });
            },
            deepClone(obj) {
                if (obj === null || typeof obj !== 'object') {
                    return obj;
                }

                if (obj instanceof Date) {
                    return new Date(obj.getTime());
                }

                if (Array.isArray(obj)) {
                    return obj.map(item => this.deepClone(item));
                }

                const clonedObj = {};
                for (let key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        clonedObj[key] = this.deepClone(obj[key]);
                    }
                }

                return clonedObj;
            }
        }
    }
</script>
