<template>
    <div>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div>
                            <img :src="'plugins/images/users/blank-profile-picture.png'" alt="user-img"
                                 class="img-circle">
                        </div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            User Name<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <li>
                                <router-link :to="{ name: 'Profile'}" class="waves-effect">
                                    <i class="icon-user fa-fw"></i> My Account
                                </router-link>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="javascript:void(0)" @click.prevent="logout">
                                    <i class="icon-logout fa-fw"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span
                            class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span></div>
                        <!-- /input-group -->
                    </li>

                    <li>
                        <router-link :to="{ name: 'Dashboard'}" class="waves-effect">
                            <i class="fa fa-sticky-note" data-icon="v"></i>
                            <span class="hide-menu"> Dashboard</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link :to="{ name: 'Blank'}" class="waves-effect">
                            <i class="fa fa-sticky-note" data-icon="v"></i>
                            <span class="hide-menu"> Blank Page</span>
                        </router-link>
                    </li>

                    <li>
                        <a href="javascript:void(0)" class="waves-effect">
                            <i class="fa fa-user" data-icon="v"></i>
                            <span class="hide-menu"> Users
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level collapse" aria-expanded="true">
                            <li>
                                <router-link :to="{ name: 'ListOfUsers'}" class="waves-effect">
                                    <i class="fa fa-th-list" data-icon="v"></i>
                                    <span class="hide-menu"> List </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'UserCreate'}" class="waves-effect">
                                    <i class="fa fa-plus" data-icon="v"></i>
                                    <span class="hide-menu"> Create New </span>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect">
                            <i class="fa fa-plane" data-icon="v"></i>
                            <span class="hide-menu"> Export
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level collapse" aria-expanded="true">
                            <li>
                                <router-link :to="{ name: 'ExportCreate'}" class="waves-effect">
                                    <i class="fa fa-plus" data-icon="v"></i>
                                    <span class="hide-menu"> Create Export </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'ExportList'}" class="waves-effect">
                                    <i class="fa fa-th-list" data-icon="v"></i>
                                    <span class="hide-menu"> List Of Exports </span>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect">
                            <i class="fa fa-truck" data-icon="v"></i>
                            <span class="hide-menu"> Import
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level collapse" aria-expanded="true">
                            <li>
                                <router-link :to="{ name: 'ImportCreate'}" class="waves-effect">
                                    <i class="fa fa-plus" data-icon="v"></i>
                                    <span class="hide-menu"> Create Import </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'ImportList'}" class="waves-effect">
                                    <i class="fa fa-th-list" data-icon="v"></i>
                                    <span class="hide-menu"> List of Imports </span>
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="waves-effect">
                            <i class="fa fa-sticky-note" data-icon="v"></i>
                            <span class="hide-menu"> Reports</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [],
        created: function () {
            console.log('NavBar component.')
        },
        methods: {
            logout() {
                this.$localStorage.clear();
                this.$router.push({name: 'Login'});
            }
        }
    }

</script>
