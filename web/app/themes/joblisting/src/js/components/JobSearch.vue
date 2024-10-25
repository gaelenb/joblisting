<template>
    <div class="banner-form-full job-list-form">
        <form @submit.prevent="handleSearch()">

            <div class="row">
                <div class="col-xs-3">
                    <!-- Static Category -->
                  <label for="category" class="sr-only">Select Job Category</label>
                  <select name="category" id="category" class="form-control" v-model="category">

                    <option value="-1">Job Category</option>

                    <option
                        v-for="category in job_categories"
                        :value="category">
                      {{ category }}
                    </option>

                  </select>
                    <!-- category-change -->
                </div>
                <div class="col-xs-3">
                <!-- Static Location -->
                  <label for="location" class="sr-only">Select Job Location</label>
                  <select 
                    v-model="location" 
                    name="location" 
                    id="location" 
                    class="form-control">

                    <option value="-1">Job Location</option>

                    <option
                        v-for="location in job_locations"
                        :value="location">
                      {{ location }}
                    </option>

                  </select><!-- language-dropdown -->
                </div>
                <div class="col-xs-6">
                    <!-- Input for search keyword -->
                    <div class="input-group">
                      <input 
                          v-model="keyword" 
                          type="text" 
                          class="form-control" 
                          placeholder="Type your keyword" 
                          aria-label="Search Jobs"
                      >
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary" value="Search">Search</button>
                      </span>
                    </div>
                
                    
                    
                </div>
            </div>
        </form>
    </div><!-- banner-form -->

</template>

<script>
export default {
    props: [
        'job_locations',
        'job_categories',
    ],
    data() {
        return {
            keyword: '',
            location: '-1',
            category: '-1',
        }
    },
    computed: {

    },
    methods: {
        handleSearch() {
            // Emit only the search keyword
            this.$emit('search', {
                keyword: this.keyword,
                category: this.category,
                location: this.location,
            });
        }
    }
}
</script>
