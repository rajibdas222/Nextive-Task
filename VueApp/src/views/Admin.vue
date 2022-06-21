<template>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Laravel & Vue Blog !! admin Page
            </a>
            <a id="logout-link" href="#" @click.prevent="logout">Logout</a>
        </div>

    </nav>
    <div class="container mt-2">
        <div class="row d-flex justify-content-center">
            <main class="col-lg-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between text-center">
                        <h2 class="text-center">All Blog Posts</h2>
                        <router-link :to="{ name: 'blogs.create' }" class="btn btn-sm btn-primary font-medium">Create Post</router-link>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Categories</th>
                                <th width="150" scope="col">Action</th>
                                <th scope="col">Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="post in posts.data" :key="post.id">
                                <td>{{ post.id }}</td>
                                <td>{{ post.title}}</td>
                                <td>{{ post.description }}</td>
                                <td>{{post.post_categories.name}}</td>
                                <td class="whitespace-no-wrap">
                                    <button class="btn btn-sm btn-info mr-1">Edit</button>
                                    <button class="btn btn-sm btn-danger">delete</button>
                                </td>
                                <td><span class="badge text-bg-primary">{{post.status}}</span></td>
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
    import axios from "axios";
    export default {
        name: "Admin",

        data() {
            return {
                posts: [],
                post_categories: [],
                status:[]
            };
        },

        async created() {
            let uri = 'posts';
            axios.get(uri)
                .then(response => {
                    console.log(response.data)
                    this.posts = response.data
                })
                .catch(error => {
                    console.error('There was an error!', error);
                });

        },


    }
</script>

<style scoped>

</style>