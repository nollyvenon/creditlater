

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
                                <h4 class="mb-1 mt-0">Installments</h4>
                            </div>
                        </div>
                        @if($installments)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive p-3">
                                        <h4 class="header-title mt-0 mb-1">Installment Table</h4>
                                        <!-- <p class="sub-header"></p> -->
                                            <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Initial payment</th>
                                                    <th>Installment</th>
                                                    <th>Balance</th>
                                                    <th>Total</th>
                                                    <th>Shipping</th>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($installments as $installment)
                                                <tr>
                                                    <td><a href="#" style="color: #717171">{{ $installment->first_name }}</a></td>
                                                    <td>@money($installment->initial_payment)</td>
                                                    <td>{{ $installment->installment }}</td>
                                                    <td>@if($installment->balance)
                                                            @money($installment->balance)
                                                            @else
                                                              <span class="text-success">Completed</span>
                                                            @endif
                                                    </td>
                                                    <td>@money($installment->total_price)</td>
                                                    <td>{{ $installment->shipping }}</td>
                                                    <td>{{ explode(' ', $installment->paid_date)[0] }}</td>
                                                    <td><a href="{{ url('/dashboard/installments-detial/'.$installment->unique_key) }}" style="color: #717171"><i class="fa fa-file"></i></a></td>
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
