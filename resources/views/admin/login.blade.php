@extends("admin.layout")


<!-- navigations -->
@section("navigations")
    @include("admin.header.navigation")
@endsection

<!-- page content-->
@section("content")
    @include("admin.login.login-body")
@endsection