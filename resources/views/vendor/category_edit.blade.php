@extends("vendor.layout")

@section("title")
     category
@endsection

<!-- navigations -->
@section("navigations")
    @include("vendor.header.navigation")
    @include("vendor.header.leftsidebar")
@endsection

<!-- page content-->
@section("content")
    @include("vendor.category_edit.category-edit-body")
@endsection