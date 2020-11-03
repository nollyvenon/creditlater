          
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row page-title">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="float-right mt-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Creditlater</a></li>
                                <li class="breadcrumb-item"><a href="#">vendor</a></li>
                                <li class="breadcrumb-item active" aria-current="page">history</li>
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Buyer History table</h4>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                 <h4 class="header-title mt-0 mb-1">Buyers</h4>
                                 @if($buyers)
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Valid ID</th>
                                            <th>Phone</th>
                                            <th>DOB</th>
                                            <th>Occupation</th>
                                            <th>Guarantor</th>
                                            <th>State</th>
                                            <th>Country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buyers as $buyer)
                                        <tr>
                                          <td>{{ $buyer->buyer_name }}</td>
                                          <td>{{ $buyer->email }}</td>
                                          <td>{{ $buyer->valid_id }}</td>
                                          <td>{{ $buyer->phone_one }}</td>
                                          <td>{{ $buyer->date_of_birth }}</td>
                                          <td>{{ $buyer->occupation }}</td>
                                          <td>{{ $buyer->guarantor_name }}</td>
                                          <td>{{ $buyer->state }}</td>
                                          <td>{{ $buyer->country }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger text-center">There are no buyers  yet!</div>
                                @endif
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div> 
        </div>
    </div>
 <!-- end of page content-->
