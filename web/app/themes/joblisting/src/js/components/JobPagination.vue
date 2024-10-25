<template>
 <!-- pagination  -->
    <div class="text-center">
        <ul class="pagination ">
            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a>...</a></li>
            <li><a href="#">10</a></li>
            <li><a href="#">20</a></li>
            <li><a href="#">30</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
        </ul>
    </div><!-- pagination  -->  
</template>

<script>
    export default {
        props: ['job_posts'],
    }
</script>
