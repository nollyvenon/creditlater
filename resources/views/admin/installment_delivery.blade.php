@extends("admin.layout")


<!-- navigations -->
@section("navigations")
    @include("admin.header.navigation")
    @include("admin.header.leftsidebar")
@endsection

<!-- page content-->
@section("content")
    @include("admin.installment_delivery.installment-delivery-body")
@endsection