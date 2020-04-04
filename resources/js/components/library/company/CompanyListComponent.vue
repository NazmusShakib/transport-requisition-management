<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Company list</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Company</a>
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
                            <el-input
                                placeholder="Search input"
                                v-model="searchText"
                                @keyup.native="filterTableData"
                                suffix-icon="el-icon-search"
                                size="small"
                            />
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12">
                            <el-button
                                type="primary"
                                class="pull-right"
                                size="small"
                                @click="dialogVisible = !dialogVisible"
                            >
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
                                <th>Display name</th>
                                <th>Description</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center" v-if="companies.total === 0">
                                <td colspan="8">No data to display.</td>
                            </tr>
                            <tr v-else v-for="(company, index) in companies.data" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ company.name }}</td>
                                <td>{{ company.display_name }}</td>
                                <td>{{ company.description }}</td>
                                <td>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Edit"
                                        @click="edit(company, index)"
                                    >
                                        <i class="fa fa-edit m-r-5"></i>
                                    </a>
                                    <span class="m-r-5">|</span>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Delete"
                                        @click="destroy(company.id, index)"
                                    >
                                        <i class="fa fa-trash-o m-r-5"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <vue-pagination
                            :pagination="companies"
                            v-if="companies.total >= 11"
                            @paginate="getCompanies()"
                            :offset="4"
                        />
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <company-modal :dialog-visible.sync="dialogVisible" :dialog-title.sync="dialogTitle"/>
    </div>
</template>

<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import VuePagination from "~/components/partials/_PaginationComponent";
    import CompanyModal from "~/components/library/company/_CompanyModalComponent";

    import {MessageBox} from "element-ui";

    export default {
        name: "CompanyList",
        components: {
            VuePagination,
            CompanyModal
        },
        data: () => ({
            companies: {
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
            this.getCompanies();
        },
        methods: {
            getCompanies() {
                axios.get(this.$baseURL + "library/companies?page=" + this.companies.current_page)
                    .then(response => {
                        this.companies = response.data;
                    })
                    .catch(() => {
                        console.log("handle server error from here.");
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
                        axios.delete(this.$baseURL + "library/companies/" + id)
                            .then(response => {
                                this.companies.data.splice(index, 1);
                                this.companies.total--;
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
            edit(company, index) {
                this.$eventBus.$emit('edit-company', company);
            }
        },
        created() {
            this.$emit("update:layout", MasterLayout);
            this.$eventBus.$on("add-company", company => {
                this.companies.total++;
                this.companies.data.unshift(company);
            });
        }
    };
</script>


<style scoped>
</style>
