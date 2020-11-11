@extends("vendor.layout")


<!-- navigations -->
@section("navigations")
    @include("vendor.header.navigation")
    @include("vendor.header.leftsidebar")
@endsection

<!-- page content-->
@section("content")
    @include("vendor.category_add.category-add-body")
@endsection