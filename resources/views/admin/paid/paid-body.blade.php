

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
                                <h4 class="mb-1 mt-0">One time payment</h4>
                            </div>
                        </div>
                        @if($paid_orders)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Buyers Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Shipping</th>
                                                    <th>State</th>
                                                    <th>Phone</th>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($paid_orders as $paid)
                                                <tr>
                                                    <td><a href="{{ url('/dashboard/paid-detail/'.$paid->reference) }}" style="color: #717171;">{{ $paid->first_name }} {{ $paid->last_name }}</a></td>
                                                    <td>#{{ $paid->reference }}</td>
                                                    <td>@money($paid->amount)</td>
                                                    <td>{{ $paid->shipping }}</td>
                                                    <td>{{ $paid->state }}</td>
                                                    <td>{{ $paid->phone }}</td>
                                                    <td>{{ date('d M Y', strtotime($paid->paid_date)) }}</td>
                                                    <td><a href="{{ url('/dashboard/paid-detail/'.$paid->reference) }}"><i class="fa fa-file"></i></a></td>
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
                         <div class="alert-danger p-3 text-center">There are no Installemnt payment Available</div>
                        @endif
                    </div> <!-- container-fluid -->

                </div> 
                <!-- content -->
