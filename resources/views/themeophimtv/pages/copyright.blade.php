@extends('themes::themeophimtv.layout')
@php
    use Artesaos\SEOTools\Facades\SEOMeta;
    SEOMeta::setTitle('Khiếu nại bản quyền', false);
    SEOMeta::setDescription(
        'Công cụ API dành cho nhà phát triển website xem phim online có thể sử dụng dữ liệu tại Ổ Phim một cách dễ dàng, thuận tiện và nhanh chóng',
    );
@endphp

@section('content')

@endsection
