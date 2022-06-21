<template>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Laravel & Vue Blog !! Welcome
            </a>
            <router-link class="btn btn-primary btn-sm" to="/admin-page">Admin Home</router-link>
        </div>

    </nav>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Create Post
                    </div>

                   <div class="card-body">
                       <form class="" @submit.prevent="submitForm">
                           <div class="space-y-4 rounded-md shadow-sm">
                               <div>
                                   <label for="title" class="block font-medium">Title</label>
                                   <div class="mt-1">
                                       <input type="text" v-model="title" name="title" id="title" class="form-control form-control-sm">
                                   </div>
                               </div>
                               <div>
                                   <div class="mt-1">
                                       <div class="form-floating">
                                           <textarea class="form-control" v-model="description" placeholder="Leave a description here" id="description"></textarea>
                                           <label for="description" class="block font-medium">Description</label>
                                       </div>
                                   </div>
                               </div>

                               <div>
                                   <label for="cat" class="block font-medium">Select Category</label>
                                   <div class="mt-1">
                                       <select class="form-control" id="cat" name="cat" v-model="blog_categories_id">
                                           <option value="0">Select Category</option>
                                           <option v-for="cat in categories" :key="cat.id" value="cat.id">
                                               {{cat.name}}
                                           </option>
                                       </select>
                                   </div>
                               </div>

                               <div class="form-group">
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="publish"
                                              v-model="status">
                                       <label class="form-check-label" for="inlineCheckbox1">Publish</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unpublished"
                                              v-model="status">
                                       <label class="form-check-label" for="inlineCheckbox2">Un Publish</label>
                                   </div>

                               </div>


                           </div>

                           <button type="submit" class="mt-2 btn btn-sm btn-primary">Create</button>
                       </form>
                   </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from "axios";
    import {ref,onMounted} from 'vue'
    export default {
        name: "CreatePost",
        setup(){
            const title = ref('');
            const description = ref('');
            const categories = ref('');
            const blog_categories_id = ref(0);
            const status= ref('');


            onMounted(async ()=>{
               const response = await axios.get('categories')
                console.log(response.data);
                categories.value = response.data
            });

            const submitForm = async () =>{
                await axios.post('posts',{
                    title:title.value,
                    description:description.value,
                    blog_categories_id:blog_categories_id.value,
                    status:status.value
                })


            }

            return{
                title,
                description,
                blog_categories_id,
                categories,
                submitForm,
                status
            }
        }


    }
</script>

