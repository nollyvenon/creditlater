@extends("vendor.layout")


<!-- navigations -->
@section("navigations")
    @include("vendor.header.navigation")
    @include("vendor.header.leftsidebar")
@endsection

<!-- page content-->
@section("content")
    @include("vendor.product_return.product-return-body")
@endsection