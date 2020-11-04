@extends("web.layout")

@section("navigations")
    @include("web.header.top-navigation")
    @include("web.header.middle-navigation")
    @include("web.header.bottom-navigation")
@endsection

<!-- about page contents-->
@section("content")
    @include("web.carts.cart-header")
    @include("web.carts.cart-body")
@endsection
