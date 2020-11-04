@extends("web.layout")


@section("navigations")
    @include("web.header.top-navigation")
    @include("web.header.middle-navigation")
    @include("web.header.bottom-navigation")
@endsection

<!-- about page contents-->
@section("content")
    @include("web.details.details-body")
    @include("web.details.product-tab")
    @include("web.details.related-products")
@endsection
