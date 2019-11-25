<template>
    <div id="wrapper" class="login-register">
        <div class="login-box box-width-loging">
            <div class="white-box">
                <form @submit.prevent="login()" method="post" class="form-horizontal form-material">
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input type="email" v-model="user.email"
                                   autocomplete="email"
                                   autofocus class="form-control"
                                   name="email" placeholder="Email" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" v-model="user.password"
                                   autocomplete="current-password"
                                   class="form-control"
                                   name="password"
                                   placeholder="Password" required>

                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Log In
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>


<script>

    import GuestLayout from '../layouts/GuestLayoutComponent.vue';

    export default {
        components: {
            //
        },
        data: () => ({
            user: {}
        }),
        methods: {
            login() {
                axios.post(this.$baseURL + 'login', this.user)
                    .then((response) => {
                        var data = response.data.data;
                        localStorage.setItem('token', data.token);
                        localStorage.setItem('auth', JSON.stringify(data.auth));
                        console.log('Login successfully' + this.user);
                        this.$router.push('/dashboard');
                    })
                    .catch((error) => {
                        this.$router.push('/login')
                        // console.log(this)
                    });
            }
        },
        mounted: function () {
            console.log('Login Component');
        },
        created() {
            this.$emit('update:layout', GuestLayout);
        },
    }
</script>

<style type="text/css">
    .panel-title {
        display: inline;
        font-weight: bold;
    }
    .display-table {
        display: table;
    }
    .display-tr {
        display: table-row;
    }
    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
    }
    .login-register {
        background-color: #2C3E50!important;
        height: 100%;
        position: fixed;
    }
    .over-flow-auto{
        overflow: auto;
    }
    .box-width-loging{
        width: 500px;
    }
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .box-width-loging{
            width: 100%;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .box-width-loging{
            width: 100%;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .box-width-loging{
            width: 500px;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .box-width-loging{
            width: 500px;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .box-width-loging{
            width: 500px;
        }
    }


</style>
