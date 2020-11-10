

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
                        @if($return_products)
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
                                                @foreach($return_products as $return)
                                                <tr>
                                                    <td>{{ $return->first_name }} {{ $return->last_name }}</td>
                                                    <td>{{ $return->email }}</td>
                                                    <td>#{{ $return->warranty_number }}</td>
                                                    <td><img src="{{ asset('storage/'.$return->warranty_slip) }}" style="width: 75px;" alt="{{ $return->first_name }}"></td>
                                                    <td>{{ explode(' ', $return->return_date)[0] }}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        @else
                         <div class="alert-danger p-3 text-center">There are no return yet</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> 
                <!-- content -->
