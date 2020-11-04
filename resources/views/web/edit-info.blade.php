@extends("web.layout")


@section("navigations")
    @include("web.header.top-navigation")
    @include("web.header.middle-navigation")
    @include("web.header.bottom-navigation")
@endsection

<!-- about page contents-->
@section("content")
    @include("web.edit-info.edit-info-header")
    @include("web.edit-info.edit-info-body")
@endsection
