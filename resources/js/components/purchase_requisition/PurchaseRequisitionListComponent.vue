<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Purchase req. list</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <router-link :to="{ name: 'PurchaseRequisitionList' }">Purchase requisition</router-link>
                    </li>
                </ol>
            </div>
        </div>

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
                                @click="$router.push({name : 'PurchaseRequisitionForm'})">
                                <i class="el-icon-plus el-icon-right"></i> Add new
                            </el-button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Company</th>
                                <th>Store</th>
                                <th>Location</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center" v-if="purchaseRequisitions.total === 0">
                                <td colspan="8">No data to display.</td>
                            </tr>
                            <tr v-else v-for="(requisition, index) in purchaseRequisitions.data" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ requisition.company ? requisition.company.name : 'N/A' }}</td>
                                <td>{{ requisition.store ? requisition.store.name : 'N/A' }}</td>
                                <td>{{ requisition.location ? requisition.location.name : 'N/A' }}</td>
                                <td>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Edit"
                                        @click="edit(requisition, index)"
                                    >
                                        <i class="fa fa-edit m-r-5"></i>
                                    </a>
                                    <span class="m-r-5">|</span>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Delete"
                                        @click="destroy(requisition.id, index)"
                                    >
                                        <i class="fa fa-trash-o m-r-5"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <vue-pagination
                            :pagination="purchaseRequisitions"
                            v-if="purchaseRequisitions.total >= 16"
                            @paginate="getPurchaseRequisitions()"
                            :offset="4"
                        />
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import VuePagination from "~/components/partials/_PaginationComponent";

    import { PurchaseRequisitionAPI } from "~/services/api";
    import { MessageBox } from "element-ui";

    export default {
        name: "PurchaseRequisitionList",
        components: {
            VuePagination,
        },
        data: () => ({
            purchaseRequisitions: {
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
            this.getPurchaseRequisitions();
        },
        methods: {
            getPurchaseRequisitions() {
                PurchaseRequisitionAPI.index(this.purchaseRequisitions.current_page).then(purchaseRequisitions => {
                    this.purchaseRequisitions = purchaseRequisitions;
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
                        PurchaseRequisitionAPI.destroy(id)
                            .then(response => {
                                this.purchaseRequisitions.data.splice(index, 1);
                                this.purchaseRequisitions.total--;
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
            edit(item, index) {
                //
            }
        },
        created() {
            this.$emit("update:layout", MasterLayout);
        }
    };
</script>

<style scoped>
    /*
     * Styles comes here
    */
</style>
