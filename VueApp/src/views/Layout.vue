<template>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel & VUE</a>
            <router-link class="btn btn-primary btn-sm" to="/login">Admin Login</router-link>
        </div>
    </nav>
    <div class="container mt-2">
        <div class="row d-flex justify-content-center">
            <main class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">All Blog Posts</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Categories</th>
                            </tr>
                            </thead>
                                <tbody>

                                <tr v-for="post in posts.data" :key="post.id">
                                    <td>{{ post.id }}</td>
                                    <td>{{ post.title}}</td>
                                    <td>{{ post.description }}</td>
                                    <td>{{post.post_categories.name}}</td>
                                </tr>

                                </tbody>
                        </table>
                    </div>
                </div>

            </main>

        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "Layout",
        data() {
            return {
                posts: [],
                post_categories:[]
            };
        },
        async created() {
            let uri = 'lists';
            axios.get(uri)
                .then(response => {
                    console.log(response.data)
                    this.posts = response.data
                })
                .catch(error => {
                    console.error('There was an error!', error);
                });

        }
    }
</script>

<style scoped>

</style>