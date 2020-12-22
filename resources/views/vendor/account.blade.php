@extends("vendor.layout")

@section("title")
     Brands
@endsection


<!-- navigations -->
@section("navigations")
    @include("vendor.header.navigation")
    @include("vendor.header.leftsidebar")
@endsection

<!-- page content-->
@section("content")
    @include("vendor.account.account-body")
@endsection