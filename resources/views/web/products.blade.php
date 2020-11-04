@extends("web.layout")


@section("navigations")
    @include("web.header.top-navigation")
    @include("web.header.middle-navigation")
    @include("web.header.bottom-navigation")
@endsection


<!-- about page contents-->
@section("content")
    @include("web.product.product-header")
    @include("web.product.product-body")
@endsection