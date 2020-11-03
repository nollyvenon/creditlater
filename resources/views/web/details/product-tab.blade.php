<!-- product-tab starts -->
<section class=" tab-product  tab-exes">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="creative-card creative-inner">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">Details</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-selected="false">Video</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Write Review</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                           <p>{{ $product->products_description }}</p>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <p>{{ $product->products_detail }}</p>
                            <div class="single-product-tables">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Febric</td>
                                        <td>Chiffon</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Red</td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>Crepe printed</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Length</td>
                                        <td>50 Inches</td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td>S, M, L .XXL</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="mt-4 text-center">
                                <iframe width="600" height="315" src="{{ $product->products_video_link }}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <form  action="{{ url('/product-rating/'.$product->id) }}" method="post" class="theme-form" id="product_rating_form">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="media">
                                            <label>Rating</label>
                                            <div class="media-body ml-3">
                                                <div class="rating three-star" id="product_star_ratings">
                                                    <i class="fa fa-star text-secondary" id="1"></i> 
                                                    <i class="fa fa-star text-secondary" id="2"></i> 
                                                    <i class="fa fa-star text-secondary" id="3"></i> 
                                                    <i class="fa fa-star text-secondary" id="4"></i> 
                                                    <i class="fa fa-star text-secondary" id="5"></i> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-danger review-name"></div>
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control product_review_name" id="name" placeholder="Enter Your name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-danger review-email"></div>
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control product_review_email" id="emai" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-danger review-title"></div>
                                        <label for="review">Review Title</label>
                                        <input type="text" class="form-control product_review_title" id="title" placeholder="Enter your Review Subjects" required>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-danger review-review"></div>
                                        <label for="review">Review</label>
                                        <textarea class="form-control product_review_review" placeholder="Wrire Your Testimonial Here" id="review" rows="6"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" class="product_id" value="{{ $product->id }}">
                                        <input type="hidden" class="star" id="star_rating_amount" value="">
                                        <button class="btn btn-normal" type="button" id="review_product_btn" data-url="{{ url('/product-review') }}">Submit Your Review</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->