<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Purchase req. details</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><router-link :to="{ name: 'PurchaseRequisitionList'}">Purchase req.</router-link></li>
                    <li class="active">Show</li>
                </ol>
            </div>
        </div>
        <!--row -->
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12">
                <div class="white-box">
                    <ul class="basic-list">
                        <li><b>Company </b><span class="pull-right">{{ purchaseRequisition.company ? purchaseRequisition.company.name : 'N/A' }}</span></li>
                        <li><b>Department </b><span class="pull-right">{{ purchaseRequisition.department ? purchaseRequisition.department.name : 'N/A' }}</span></li>
                        <li><b>Store </b> <span class="pull-right">{{ purchaseRequisition.store ? purchaseRequisition.store.name : 'N/A' }}</span></li>
                        <li><b>Location </b><span class="pull-right">{{ purchaseRequisition.location ? purchaseRequisition.location.name : 'N/A' }}</span></li>
                        <li><b>Section </b><span class="pull-right">{{ purchaseRequisition.section ? purchaseRequisition.section.name : 'N/A' }}</span></li>
                        <li><b>Division </b><span class="pull-right">{{ purchaseRequisition.division ? purchaseRequisition.division.name : 'N/A' }}</span></li>
                        <li><b>Source </b><span class="pull-right">{{ purchaseRequisition.source ? purchaseRequisition.source.name : 'N/A' }}</span></li>
                        <li><b>Pay mode </b><span class="pull-right">{{ purchaseRequisition.pay_mode }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                <div class="white-box">
                    <ul class="basic-list">
                        <li><b>Requisition date </b><span class="pull-right">{{ purchaseRequisition.requisition_date }}</span></li>
                        <li><b>Delivery date </b><span class="pull-right">{{ purchaseRequisition.delivery_date }}</span></li>
                        <li><b>Remarks </b><span class="pull-right">{{ purchaseRequisition.remarks }}</span></li>
                        <li><b>Ready to approve </b><span class="pull-right">{{ purchaseRequisition.ready_to_approve }}</span></li>
                        <li><b>ISO no. </b><span class="pull-right">{{ purchaseRequisition.iso_no }}</span></li>
                        <li><b>Manual requisition no. </b><span class="pull-right">{{ purchaseRequisition.manual_requisition_no }}</span></li>
                        <li><b>Created by </b><span class="pull-right">{{ purchaseRequisition.created_by ? purchaseRequisition.created_by.name : 'N/A' }}</span></li>
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

    import { PurchaseRequisitionsAPI } from "~/services/api";

    export default {
        name: 'PurchaseRequisitionShow',
        components: {
            //
        },
        data: () => ({
            purchaseRequisition: {}
        }),
        mounted: function () {
            this.purchaseRequisitionShow(this.$route.params.id);
        },
        methods: {
            purchaseRequisitionShow(id) {
                PurchaseRequisitionsAPI.show(id).then(purchaseRequisition => {
                    this.purchaseRequisition = purchaseRequisition.data;
                });
            },
        },
        created() {
            this.$emit('update:layout', MasterLayout);
        },
    }
</script>

