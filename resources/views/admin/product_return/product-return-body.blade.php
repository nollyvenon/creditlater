

            <!-- start content -->
            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row page-title">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                           <!-- something here -->
                                    </ol>
                                </nav>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Product return Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Warranty reference</th>
                                                    <th>Warranty Slip</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                             
                                            <tbody>
                                            @if($return_products)
                                                @foreach($return_products as $return)
                                                <tr>
                                                    <td>{{ $return->first_name }} {{ $return->last_name }}</td>
                                                    <td>{{ $return->email }}</td>
                                                    <td>#{{ $return->warranty_number }}</td>
                                                    <td><img src="{{ asset($return->warranty_slip) }}" style="width: 75px;" alt="{{ $return->first_name }}"></td>
                                                    <td>{{ date('d M Y', strtotime($return->return_date)) }}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            @endif
                                        </table>
                                        @if(!$return_products)
                                        <div class="alert p-3 text-center">There are no returned products yet.</div>
                                        @endif
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                    </div> <!-- container-fluid -->

                </div> 
                <!-- content -->
