<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Import</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Import</a></li>
                    <li class="active">Create</li>
                </ol>
            </div>
        </div>
        <!--row -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">

                    <form  action="#" method="POST" @submit.prevent="importCreate()" novalidate>

                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label class="control-label">Requisition No</label>
                                <input type="number" name="requisition_no" class="form-control" placeholder="Auto generate">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Requisition Date</label>
                                <input type="date" name="requisition_date" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label class="control-label">Requisition Create By </label>
                                <input type="text" name="created_by" class="form-control" placeholder="Enter Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Requisition Location</label>
                                <select class="form-control" name="requisition_location">
                                    <option>---Select Location---</option>
                                    <option value="MFL">Micro Fibre Ltd</option>
                                    <option value="MKL">Midland Knitwear Ltd</option>
                                    <option value="LKL">Liberty Kinwear Ltd</option>
                                    <option value="AOPL">A-One Polar Ltd</option>
                                    <option value="OCTL">Orient Chem-Tex Ltd</option>
                                    <option value="HCL">Harmony Chem Ltd</option>
                                    <option value="MTL">Micro Trims Ltd</option>
                                    <option value="Chittagong Station">Chittagong Station</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Consignee Name</label>
                                <select class="form-control" name="consignee_name">
                                    <option>---Select Consignee Name---</option>
                                    <option value="MFL">Micro Fibre Ltd</option>
                                    <option value="MKL">Midland Knitwear Ltd</option>
                                    <option value="LKL">Liberty Kinwear Ltd</option>
                                    <option value="AOPL">A-One Polar Ltd</option>
                                    <option value="OCTL">Orient Chem-Tex Ltd</option>
                                    <option value="HCL">Harmony Chem Ltd</option>
                                    <option value="MTL">Micro Trims Ltd</option>
                                    <option value="TCBL">Tubingen Chem (BD)</option>
                                    <option value="STL">Sungarh Tex Ltd</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">LC No</label>
                                <input type="text" name="lc_no" class="form-control" placeholder="Enter LC No">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">LC Date</label>
                                <input type="date" name="lc_date" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Item</label>
                                <input type="text" name="items" class="form-control" placeholder="Enter Item">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Quantity</label>
                                <input type="number" name="qty" class="form-control" placeholder="Enter Quantity">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">No Of Box</label>
                                <input type="number" name="no_of_box" class="form-control" placeholder="Enter No Of Box">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">No Of Drum</label>
                                <input type="number" name="no_of_drum" class="form-control" placeholder="Enter No Of Drum">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">No Of Jar</label>
                                <input type="number" name="no_of_jar" class="form-control" placeholder="Enter No Of Jar">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">No Of Bag</label>
                                <input type="number" name="no_of_bag" class="form-control" placeholder="Enter No Of Bag">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">No Of Roll</label>
                                <input type="number" name="no_of_roll" class="form-control" placeholder="Enter No Of Roll">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">No Of Bell</label>
                                <input type="number" name="no_of_bell" class="form-control" placeholder="Enter No Of Bell">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">No Of CBM</label>
                                <input type="number" name="no_of_cbm" class="form-control" placeholder="Enter No Of CBM">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">CNF Name</label>
                                <input type="text" name="cnf_name" class="form-control" placeholder="Enter CNF Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Jetty Sorkar Name</label>
                                <input type="text" name="jetty_sorkar_name" class="form-control" placeholder="Enter Jetty Sorkar Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Jetty Sorkar Cell No</label>
                                <input type="number" name="jetty_sorkar_cell_no" class="form-control" placeholder="Enter Jetty Sorkar Cell No">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Load Time</label>
                                <div class="input-group">
                                    <input type="text" name="load_time" class="form-control " placeholder="Enter Load Time">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Get Out Time</label>
                                <div class="input-group">
                                    <input type="text" name="get_out_time" class="form-control timepicker" placeholder="Enter Get Out Time" >
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Storage Location</label>
                                <input type="text" name="storage_location" class="form-control" placeholder="Enter Storage Location">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class=" control-label">Store Concern Name</label>
                                <input type="text" name="store_concern_name" class="form-control" placeholder="Enter Store Concern Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Store Concern Cell No</label>
                                <input type="text" name="store_concern_cell_no" class="form-control" placeholder="Enter Store Concern Cell No">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">No Of Van</label>
                                <input type="number" name="no_of_van" class="form-control" placeholder="Enter No Of Van">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Fare</label>
                                <input type="number" name="fare" class="form-control" placeholder="Enter Fare">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Transport Name</label>
                                <input type="text" name="transport_name" class="form-control" placeholder="Enter Transport Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Cover Van Capacity</label>
                                <input type="number" name="cover_van_capacity" class="form-control" placeholder="Enter Capacity">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Cover Van No</label>
                                <input type="number" name="cover_van_no" class="form-control" placeholder="Enter No">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger pull-left">Save Requisition Info</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
    import MasterLayout from '~/components/layouts/MasterLayoutComponent.vue';

    export default {
        name: 'ImportCreate',
        components: {
            //
        },
        data: () => ({
            //
        }),
        mounted: function () {
            console.log('Import create component mounted.');
        },
        methods: {
            ImportCreate() {
                console.log('Submitted.');
            }
        },
        created() {
            this.$emit('update:layout', MasterLayout);
        },
    }
</script>

