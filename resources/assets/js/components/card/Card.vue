<template>
    <div>
        <div class="row" v-if="posts && posts.length">
            <div class="col-md-3" v-for="post of posts">
                <div class="card rounded mb-3">
                    <img class="card-img-top" src="https://placeimg.com/480/270/any" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ post.title }}</h4>
                        <p class="card-text">
                            {{ post.body }}
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <ul v-if="errors && errors.length">
            <li v-for="error of errors">
                {{error.message}}
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                posts: [],
                errors: []
            }
        },
        created() {
            axios.get(`http://jsonplaceholder.typicode.com/posts`)
            .then(response => {
                // JSON responses are automatically parsed.
                this.posts = response.data
            })
            .catch(e => {
                this.errors.push(e)
            })        
        }
    }
</script>
