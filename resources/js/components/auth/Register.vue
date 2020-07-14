<template>
    <div class="login-box">
        <div class="white-box">

            <h1>Register</h1>

        </div>
    </div>

</template>

<script>
    import GuestLayout from '~/components/layouts/GuestLayoutComponent.vue';

    export default {
        data: () => ({
            //
        }),
        mounted: function () {
            console.log('Register component mounted.');
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

    .login-box {
        background: #fff;
        width: 400px;
        margin: auto;
        margin-top: 50px;
    }

    .over-flow-auto {
        overflow: auto;
    }

    .box-width-loging {
        width: 500px;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .box-width-loging {
            width: 100%;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .box-width-loging {
            width: 100%;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .box-width-loging {
            width: 500px;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .box-width-loging {
            width: 500px;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .box-width-loging {
            width: 500px;
        }
    }
</style>

