@extends("admin.layout")


<!-- navigations -->
@section("navigations")
    @include("admin.header.navigation")
    @include("admin.header.leftsidebar")
@endsection

<!-- page content-->
@section("content")
    @include("admin.installments.installment-body")
@endsection