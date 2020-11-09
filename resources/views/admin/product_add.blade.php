@extends("admin.layout")


<!-- navigations -->
@section("navigations")
    @include("admin.header.navigation")
    @include("admin.header.leftsidebar")
@endsection

<!-- page content-->
@section("content")
    @include("admin.product_add.product-add-body")
@endsection