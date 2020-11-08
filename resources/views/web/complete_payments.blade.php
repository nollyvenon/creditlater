@extends("web.layout")


@section("navigations")
    @include("web.header.top-navigation")
    @include("web.header.middle-navigation")
    @include("web.header.bottom-navigation")
@endsection


<!-- about page contents-->
@section("content")
    @include("web.complete_payment.complete-payment-body")
@endsection