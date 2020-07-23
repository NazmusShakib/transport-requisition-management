<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Department list</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Department</a>
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
                            <tr class="text-center" v-if="departments.total === 0">
                                <td colspan="8">No data to display.</td>
                            </tr>
                            <tr v-else v-for="(department, index) in departments.data" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ department.name }}</td>
                                <td>{{ department.short_name }}</td>
                                <td>{{ department.description }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Edit" @click="edit(department, index)">
                                        <i class="fa fa-edit m-r-5"></i>
                                    </a>
                                    <span class="m-r-5">|</span>
                                    <a href="javascript:void(0)"
                                        data-toggle="tooltip" title="Delete"
                                        @click="destroy(department.id, index)">
                                        <i class="fa fa-trash-o m-r-5"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <vue-pagination
                            :pagination="departments"
                            v-if="departments.total >= 11"
                            @paginate="getDepartments()"
                            :offset="4"
                        />
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <department-modal :dialog-visible.sync="dialogVisible" :dialog-title.sync="dialogTitle"/>
    </div>
</template>

<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import VuePagination from "~/components/partials/_PaginationComponent";
    import DepartmentModal from "~/components/library/department/_DepartmentModalComponent";
    import DepartmentsAPI from '~/services/api/departmentsApi';

    import {MessageBox} from "element-ui";

    export default {
        components: {
            VuePagination,
            DepartmentModal
        },
        data: () => ({
            departments: {
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
            this.getDepartments();
        },
        methods: {
            getDepartments() {
                DepartmentsAPI.index(this.departments.current_page).then(departments => {
                    this.departments = departments;
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
                        axios.delete(this.$baseURL + "library/departments/" + id)
                            .then(response => {
                                this.departments.data.splice(index, 1);
                                this.departments.total--;
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
            edit(department, index) {
                this.$eventBus.$emit('edit-department', department);
            }
        },
        created() {
            this.$emit("update:layout", MasterLayout);
            this.$eventBus.$on("add-department", department => {
                this.departments.total++;
                this.departments.data.unshift(department);
            });
        }
    };
</script>


<style scoped>
</style>
