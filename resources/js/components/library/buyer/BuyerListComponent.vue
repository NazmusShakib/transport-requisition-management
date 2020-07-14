<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Buyer list</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Buyer</a>
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
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center" v-if="buyers.total === 0">
                                <td colspan="8">No data to display.</td>
                            </tr>
                            <tr v-else v-for="(buyer, index) in buyers.data" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ buyer.name }}</td>
                                <td>{{ buyer.phone }}</td>
                                <td>{{ buyer.email }}</td>
                                <td>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Edit"
                                        @click="edit(buyer, index)"
                                    >
                                        <i class="fa fa-edit m-r-5"></i>
                                    </a>
                                    <span class="m-r-5">|</span>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Delete"
                                        @click="destroy(buyer.id, index)"
                                    >
                                        <i class="fa fa-trash-o m-r-5"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <vue-pagination
                            :pagination="buyers"
                            v-if="buyers.total >= 16"
                            @paginate="getBuyers()"
                            :offset="4"
                        />
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <buyer-modal :dialog-visible.sync="dialogVisible" :dialog-title.sync="dialogTitle"/>
    </div>
</template>

<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import VuePagination from "~/components/partials/_PaginationComponent";
    import BuyerModal from "~/components/library/buyer/_BuyerModelComponent";
    import BuyersAPI from "~/services/api/buyersApi";

    import { MessageBox } from "element-ui";

    export default {
        name: "BuyerList",
        components: {
            VuePagination,
            BuyerModal
        },
        data: () => ({
            buyers: {
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
            this.getBuyers();
        },
        methods: {
            getBuyers() {
                BuyersAPI.index(this.buyers.current_page).then(buyers => {
                    this.buyers = buyers;
                });
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
                        axios.delete(this.$baseURL + "library/buyers/" + id)
                            .then(response => {
                                this.buyers.data.splice(index, 1);
                                this.buyers.total--;
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
            edit(buyer, index) {
                this.$eventBus.$emit('edit-buyer', buyer, index);
            }
        },
        created() {
            this.$emit("update:layout", MasterLayout);

            this.$eventBus.$on("add-buyer", buyer => {
                this.buyers.total++;
                this.buyers.data.unshift(buyer);
            });
            this.$eventBus.$on("update-buyer", buyer => {
                this.getBuyers();
            });
        }
    };
</script>


<style scoped>
</style>
