@extends(backpack_view('blank'))

@php
//    $widgets['before_content'][] = [
//        'type'        => 'jumbotron',
//        'heading'     => trans('backpack::base.welcome'),
//        'content'     => trans('backpack::base.use_sidebar'),
//        'button_link' => backpack_url('logout'),
//        'button_text' => trans('backpack::base.logout'),
//    ];
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => "Статьи",
        'content'     => "Количество статей: ".\App\Models\Article::count(),
        //'button_link' => backpack_url('logout'),
    //'button_text' => trans('backpack::base.logout'),
    ];
@endphp

@section('content')
@endsection
