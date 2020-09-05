<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Work order details</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><router-link :to="{ name: 'WorkOrderList'}">Work orders</router-link></li>
                    <li class="active">Show</li>
                </ol>
            </div>
        </div>
        <!--row -->
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12">
                <div class="white-box">
                    <ul class="basic-list">
                        <li><b>Company. </b><span class="pull-right">{{ workOrder.company ? workOrder.company.name : 'N/A' }}</span></li>
                        <li><b>Supplier</b><span class="pull-right">{{ workOrder.supplier ? workOrder.supplier.name : 'N/A' }}</span></li>
                        <li><b>Source </b> <span class="pull-right">{{ workOrder.source ? workOrder.source.name : 'N/A' }}</span></li>
                        <li><b>Location </b><span class="pull-right">{{ workOrder.location ? workOrder.location.name : 'N/A' }}</span></li>
                        <li><b>Pay mode </b><span class="pull-right">{{ workOrder.pay_mode }}</span></li>
                        <li><b>Delivery date </b><span class="pull-right">{{ workOrder.delivery_date }}</span></li>
                        <li><b>Ready to Approve </b><span class="pull-right">{{ workOrder.ready_to_approve }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                <div class="white-box">
                    <ul class="basic-list">
                        <li><b>Place of Delivery </b><span class="pull-right">{{ workOrder.place_of_delivery }}</span></li>
                        <li><b>Part of Loading </b><span class="pull-right">{{ workOrder.part_of_loading }}</span></li>
                        <li><b>Tenor </b><span class="pull-right">{{ workOrder.tenor }}</span></li>
                        <li><b>Pay Term </b><span class="pull-right">{{ workOrder.pay_term }}</span></li>
                        <li><b>Attention </b><span class="pull-right">{{ workOrder.attention }}</span></li>
                        <li><b>Created By </b><span class="pull-right">{{ workOrder.created_by ? workOrder.created_by.name : 'N/A' }}</span></li>
                        <li><b>&nbsp; </b><span class="pull-right"></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
    import MasterLayout from '~/components/layouts/MasterLayoutComponent.vue';

    import { WorkOrdersAPI } from "~/services/api";

    export default {
        name: 'WorkOrderShow',
        components: {
            //
        },
        data: () => ({
            workOrder: {}
        }),
        mounted: function () {
            this.workOrderShow(this.$route.params.id);
        },
        methods: {
            workOrderShow(id) {
                WorkOrdersAPI.show(id).then(workOrder => {
                    this.workOrder = workOrder.data;
                });
            },
        },
        created() {
            this.$emit('update:layout', MasterLayout);
        },
    }
</script>

