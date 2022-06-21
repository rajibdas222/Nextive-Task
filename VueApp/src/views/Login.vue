<template>
    <h4>Admin Login Page</h4>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <form @submit.prevent="login">
                    <div class="form-floating ">
                        <input v-model="form.email" type="email" class="form-control form-control-sm"  placeholder="name@example.com">
                        <label>Email address</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input v-model="form.password" type="password" class="form-control form-control-sm" placeholder="Password">
                        <label>Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import store from '../store'
    export default {
        data(){
            return{
                form: {
                    email: null,
                    password: null,

                },
                loginError:false
            }
        },

        methods:{
            async login(){
                this.loginError = false;
                axios.post('login', this.form)
                    .then(function (response) {
                        //console.log(response.data.token);
                        store.commit('loginUser')
                        localStorage.setItem('token', response.data.token)
                    })
                  await this.$router.push('/admin-page')
                    .catch(function (error) {
                        console.log(error);
                    });
            }


        }
    }
</script>

<style scoped>

</style>
