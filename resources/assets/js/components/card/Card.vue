<template>
    <div class="card rounded mb-3">
        <img class="card-img-top" src="holder.js/100px180?random=yes" alt="">
        <div class="card-body">
            <h4 class="card-title">{{ title }}</h4>
            <p class="card-text">
                {{ text }}
            </p>
            <a href="#" class="btn btn-primary">Read More</a>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: {
            title: 'Title',
            text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quasi saepe, harum fugit numquam nesciunt.'
        }
    }
</script>
