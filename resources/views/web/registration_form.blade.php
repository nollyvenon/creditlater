@extends("web.layout")


@section("navigations")
    @include("web.header.top-navigation")
    @include("web.header.middle-navigation")
    @include("web.header.bottom-navigation")
@endsection


<!-- about page contents-->
@section("content")
    @include("web.registration_form.registration-page-header")
    @include("web.registration_form.registration-page-body")
@endsection