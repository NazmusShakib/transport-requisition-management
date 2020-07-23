<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Store list</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Store</a>
                    </li>
                    <li class="active">List</li>
                </ol>
            </div>
        </div>
        <!--row -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-sm-12">
                            <el-input placeholder="Search input"
                                v-model="searchText"
                                @keyup.native="filterTableData"
                                suffix-icon="el-icon-search"
                                size="small"/>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12">
                            <el-button type="primary"
                                class="pull-right" size="small"
                                @click="dialogVisible = !dialogVisible">
                                <i class="el-icon-plus el-icon-right"></i> Add new
                            </el-button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Short name</th>
                                <th>Description</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center" v-if="libraries.total === 0">
                                <td colspan="8">No data to display.</td>
                            </tr>
                            <tr v-else v-for="(library, index) in libraries.data" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ library.name }}</td>
                                <td>{{ library.short_name }}</td>
                                <td>{{ library.description }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Edit" @click="edit(library, index)">
                                        <i class="fa fa-edit m-r-5"></i>
                                    </a>
                                    <span class="m-r-5">|</span>
                                    <a href="javascript:void(0)"
                                        data-toggle="tooltip" title="Delete"
                                        @click="destroy(library.id, index)">
                                        <i class="fa fa-trash-o m-r-5"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <vue-pagination
                            :pagination="libraries"
                            v-if="libraries.total >= 11"
                            @paginate="getLibraries()"
                            :offset="4"
                        />
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <store-modal :dialog-visible.sync="dialogVisible" :dialog-title.sync="dialogTitle"/>
    </div>
</template>

<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import VuePagination from "~/components/partials/_PaginationComponent";
    import StoreModal from "~/components/library/store/_StoreModalComponent";
    import StoresAPI from '~/services/api/storesApi';

    import {MessageBox} from "element-ui";

    export default {
        components: {
            VuePagination,
            StoreModal
        },
        data: () => ({
            libraries: {
                total: 0,
                per_page: 1,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,
            searchText: "",
            dialogVisible: false,
            dialogTitle: "Add a new",
        }),
        mounted: function () {
            this.getLibraries();
        },
        methods: {
            getLibraries() {
                StoresAPI.index(this.libraries.current_page).then(libraries => {
                    this.libraries = libraries;
                });
            },
            filterTableData() {
                //
            },
            destroy(id, index) {
                MessageBox.confirm(
                    "This will permanently delete. Continue?",
                    "Warning",
                    {
                        confirmButtonText: "OK",
                        cancelButtonText: "Cancel",
                        type: "warning"
                    }
                )
                    .then(() => {
                        axios.delete(this.$baseURL + "library/stores/" + id)
                            .then(response => {
                                this.libraries.data.splice(index, 1);
                                this.libraries.total--;
                                this.$notification.success(response.data.message);
                            })
                            .catch(error => {
                                console.log("Could not delete this.");
                            });
                    })
                    .catch(() => {
                        console.log("Delete canceled");
                    });
            },
            edit(library, index) {
                this.$eventBus.$emit('edit-store', library);
            }
        },
        created() {
            this.$emit("update:layout", MasterLayout);
            this.$eventBus.$on("add-store", library => {
                this.libraries.total++;
                this.libraries.data.unshift(library);
            });
        }
    };
</script>


<style scoped>
</style>
