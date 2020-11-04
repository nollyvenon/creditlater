


<!--section start-->
<section class="contact-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row section-big-pb-space">
            <div class="col-xl-8 offset-xl-2" id="verification_form_container">
            <!-- verification form start -->
               <div class="verification-forms">
                    @if(Session::has('image-error'))
                        <div class="alert-danger p-2 mb-1 text-center">{{ Session::get('image-error')}}</div>
                    @endif
                    <!-- user form start -->
                    <form action="{{ url('registration-form/'.Session::get('user')['id']) }}" method="post" enctype="multipart/form-data"class="theme-form">
                        <div class="form-row">
                            <div class="col-md-6">
                            <div class="form-group">
                                @if($errors->first('first_name'))
                                <div class="text-danger verification-alert">*{{ $errors->first('first_name') }}</div>
                                @endif
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter Your name" value="{{ old('first_name') ?? $saved_reg_details->first_name }}" required="">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                @if($errors->first('last_name'))
                                <div class="text-danger verification-alert">*{{ $errors->first('last_name') }}</div>
                                @endif
                                <label for="email">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') ??  $saved_reg_details->last_name }}" required="">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                @if($errors->first('phone'))
                                <div class="text-danger verification-alert">*{{ $errors->first('phone') }}</div>
                                @endif
                                <label for="review">Phone number</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter your number" value="{{ old('phone') ??  $saved_reg_details->phone }}" required="">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($errors->first('dob'))
                                    <div class="text-danger verification-alert">*{{ $errors->first('date_of_birth') }}</div>
                                    @endif
                                    <label for="date_of_birth">Date of birth</label>
                                    <input type="date" class="form-control" name="date_of_birth" placeholder="Date of birth" value="{{ old('date_of_birth') ??  $saved_reg_details->date_of_birth }}" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($errors->first('national_id'))
                                    <div class="text-danger verification-alert">*{{ $errors->first('national_id') }}</div>
                                    @endif
                                    <label for="nin">Nation ID number</label>
                                    <input type="text" class="form-control" name="national_id" placeholder="NIN" value="{{ old('national_id') ??  $saved_reg_details->national_id }}" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($errors->first('status'))
                                    <div class="text-danger verification-alert">*{{ $errors->first('status') }}</div>
                                    @endif
                                    <label for="status">Marital status</label>
                                    <select name="status" class="form-control" style="height: 50px;">
                                        <option value="">select</option>
                                        <option value="single">Single</option>
                                        <option value="married">married</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($errors->first('occupation'))
                                    <div class="text-danger verification-alert">*{{ $errors->first('occupation') }}</div>
                                    @endif
                                    <label for="occupation">Occupation</label>
                                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" value="{{ old('ccupation') ??  $saved_reg_details->occupation}}" required="">
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <div class="form-group" >
                                    @if($errors->first('proof_of_employment'))
                                    <div class="text-danger verification-alert">*{{ $errors->first('proof_of_employment') }}</div>
                                    @endif
                                    <label for="email">Proof of employment/work<l>
                                    <input type="file" class="form-control" name="proof_of_employment" placeholder="Image here" value="{{ old('proof_of_employment') }}" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    @if($errors->first('supporing_document'))
                                    <div class="text-danger verification-alert">*{{ $errors->first('supporing_document') }}</div>
                                    @endif
                                    <label for="supporing_document">Supporting documents<l>
                                    <input type="file" class="form-control" name="supporing_document" placeholder="supporting document">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    @if($errors->first('address'))
                                    <div class="text-danger verification-alert">*{{ $errors->first('address') }}</div>
                                    @endif
                                    <label for="review">Address</label>
                                    <textarea class="form-control" placeholder="Write Your Message" name="address" rows="2"  value="">{{ old('address') ??  $saved_reg_details->address }}</textarea>
                                </div>
                            </div>
                        </div>

                         <!-- verification form end -->
                        <div class="verification-forms">
                            <br><br><br><br>
                            <h3 class="text-center mb-3">Guarantor Registration</h3> <br>
                    <!-- user form start -->
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        @if($errors->first('guarantor_first_name'))
                                        <div class="text-danger verification-alert">*{{ $errors->first('guarantor_first_name') }}</div>
                                        @endif
                                        <label for="name">First Name</label>
                                        <input type="text" class="form-control" name="guarantor_first_name" placeholder="Enter Your name" value="{{ old('guarantor_first_name') ??  $saved_reg_details->guarantor_first_name }}" required="">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        @if($errors->first('guarantor_last_name'))
                                        <div class="text-danger verification-alert">*{{ $errors->first('guarantor_last_name') }}</div>
                                        @endif
                                        <label for="email">Last Name</label>
                                        <input type="text" class="form-control" name="guarantor_last_name" placeholder="Last Name" value="{{ old('guarantor_last_name') ?? $saved_reg_details->guarantor_last_name}}" required="">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        @if($errors->first('guarantor_phone'))
                                        <div class="text-danger verification-alert">*{{ $errors->first('guarantor_phone') }}</div>
                                        @endif
                                        <label for="review">Phone number</label>
                                        <input type="text" class="form-control" name="guarantor_phone" placeholder="Enter your number" value="{{ old('guarantor_phone') ?? $saved_reg_details->guarantor_phone }}" required="">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @if($errors->first('guarantor_date_of_birth'))
                                            <div class="text-danger verification-alert">*{{ $errors->first('guarantor_date_of_birth') }}</div>
                                            @endif
                                            <label for="dob">Date of birth</label>
                                            <input type="date" class="form-control" name="guarantor_date_of_birth" placeholder="Date of birth" value="{{ old('guarantor_date_of_birth') ?? $saved_reg_details->guarantor_date_of_birth }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @if($errors->first('guarantor_national_id'))
                                            <div class="text-danger verification-alert">*{{ $errors->first('guarantor_national_id') }}</div>
                                            @endif
                                            <label for="nin">Nation ID number</label>
                                            <input type="text" class="form-control" name="guarantor_national_id" placeholder="NIN" value="{{ old('guarantor_national_id') ??  $saved_reg_details->guarantor_national_id }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            @if($errors->first('guarantor_status'))
                                            <div class="text-danger verification-alert">*{{ $errors->first('guarantor_status') }}</div>
                                            @endif
                                            <label for="guarantor_status">Marital status</label>
                                            <select name="guarantor_status" class="form-control" style="height: 50px;">
                                                <option value="">select</option>
                                                <option value="single">Single</option>
                                                <option value="married">married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @if($errors->first('guarantor_occupation'))
                                            <div class="text-danger verification-alert">*{{ $errors->first('guarantor_occupation') }}</div>
                                            @endif
                                            <label for="occupation">Occupation</label>
                                            <input type="text" class="form-control" name="guarantor_occupation" placeholder="occupation" value="{{ old('guarantor_occupation') ?? $saved_reg_details->guarantor_occupation }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @if($errors->first('guarantor_relationship'))
                                            <div class="text-danger verification-alert">*{{ $errors->first('guarantor_relationship') }}</div>
                                            @endif
                                            <label for="rwb">Relationship with buyer</label>
                                            <input type="text" class="form-control" name="guarantor_relationship" placeholder="Relationship with buyer" value="{{ old('guarantor_relationship') ?? $saved_reg_details->guarantor_relationship }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            @if($errors->first('guarantor_address'))
                                            <div class="text-danger verification-alert">*{{ $errors->first('guarantor_address') }}</div>
                                            @endif
                                            <label for="review">Address</label>
                                            <textarea class="form-control" placeholder="Write Your Message" name="guarantor_address" rows="2" value="">{{ old('guarantor_address') ?? $saved_reg_details->guarantor_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ url('/verification') }}" class="btn btn-normal"> <i class="fa fa-angle-left"></i> <i class="fa fa-angle-left"></i> Back</a>
                                        <button tyep="submit" class="btn btn-normal verification-register-btn" type="submit">Register</button>
                                    </div>
                                    @csrf
                                </div>
                            <!-- user form end -->
               </div>
                <!-- verification form end -->
                    </form>
                    <!-- user form end -->
               </div>
                <!-- verification form end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 map">
                <div class="theme-card">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1605.811957341231!2d25.45976406005396!3d36.3940974010114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1550912388321"  allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
