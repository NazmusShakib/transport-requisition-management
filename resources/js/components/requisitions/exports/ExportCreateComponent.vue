<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Export</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Export</a></li>
                    <li class="active">Create</li>
                </ol>
            </div>
        </div>
        <!--row -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">

                    <form  action="#" method="POST" @submit.prevent="exportCreate()" novalidate>

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
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Buyer Name</label>
                                <select class="form-control" name="buyer_name">
                                    <option>---Select Buyer Name---</option>
                                    <option value="C&A">C&A</option>
                                    <option value="H&M">H&M</option>
                                    <option value="demo">KIABI</option>
                                    <option value="demo">JENIFER</option>
                                    <option value="demo">NEXT</option>
                                    <option value="demo">STILL STROM</option>
                                    <option value="demo">LIDL</option>
                                    <option value="demo">LIDL</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Load Point</label>
                                <select class="form-control" name="load_point">
                                    <option>---Select Buyer Name---</option>
                                    <option value="Vulta">Vulta</option>
                                    <option value="Fatullah">Fatullah</option>
                                    <option value="Kaliakoir">Kaliakoir</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Unload Point</label>
                                <select class="form-control" name="unload_point">
                                    <option>---Select Unload Point---</option>
                                    <option value="Airport-Hemlane">Airport-Hemlane</option>
                                    <option value="Airport-Nippon">Airport-Nippon</option>
                                    <option value="All Port">All Port</option>
                                    <option value="BM">BM</option>
                                    <option value="BM">Incontred</option>
                                    <option value="Ispahani">Ispahani</option>
                                    <option value="K&T">K&T</option>
                                    <option value="KDS">KDS</option>
                                    <option value="Mawna">Mawna</option>
                                    <option value="Mokterpur">Mokterpur</option>
                                    <option value="Nemsan">Nemsan</option>
                                    <option value="NKD">Nemsan</option>
                                    <option value="OCL">OCL</option>
                                    <option value="Portlink">Portlink</option>
                                    <option value="SAPL">SAPL</option>
                                </select>
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
                                <label  class="control-label">CBM</label>
                                <input type="number" name="cbm" class="form-control" placeholder="Enter CBM">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">No Of Van</label>
                                <input type="number" name="no_of_van" class="form-control" placeholder="Enter No Of Van">
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
                            <div class=" form-group col-md-6 bootstrap-timepicker">
                                <label  class="control-label">Unload Time</label>
                                <div class="input-group">
                                    <input type="text" name="unload_time" class="form-control timepicker" placeholder="Enter Unload Time">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label  class="control-label">Cut Off Time</label>
                                <div class="input-group">
                                    <input type="text" name="cut_of_time" class="form-control timepicker" placeholder="Enter Cut Of Time">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label  class="control-label">Cut Off Date</label>
                                <input type="date" name="cut_off_date" class="form-control">
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
        name: 'ExportCreate',
        components: {
            //
        },
        data: () => ({
            //
        }),
        mounted: function () {
            console.log('Export create component mounted.');
        },
        methods: {
            exportCreate() {
                console.log('Submitted.');
            }
        },
        created() {
            this.$emit('update:layout', MasterLayout);
        },
    }
</script>

