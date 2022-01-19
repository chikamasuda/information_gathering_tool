@extends('layouts.app')

@section('content')
<section class="row container mt-4 justify-content-between ml-4 mx-auto">
    <div class="mt-2 mb-5 col-md-4 p-0">
    <h2 class="title title-border pb-2">イベントを絞り込む</h2>
        <div class="search-card">
        <form action="{{ route('php.search') }}" method="get">
                @csrf
                <div>
                    <div class="form-group">
                        <label for="">キーワード</label>
                        <input type="text" class="form-control text-black" name="php_keyword" value="{{ old('php_keyword', request('keyword')) }}" placeholder="キーワードを入力">
                    </div>
                    <div class="form-group">
                        <label for="">開催日</label>
                        <div class="d-flex form-group">
                        <input placeholder="From" class="form-control text-black" type="text" onfocus="(this.type='date')" onfocusout="this.type='text'"   name="php_start_date" value="{{ old('php_start_date', request('php_start_date')) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex form-group">
                        <input placeholder="To" class="form-control text-black" type="text" onfocus="(this.type='date')" onfocusout="this.type='text'" name="php_end_date" value="{{ old('php_end_date', request('php_end_date')) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>表示順</label>
                        <select class="form-control" name="php_sort">
                            <option value="date_asc" class="bg-white" @if(old('php_sort') === 'date_asc' ) selected @endif>開催日昇順</option>
                            <option value="date_desc" class="bg-white" @if(old('php_sort') === 'date_desc' ) selected @endif>開催日降順</option>
                            <option value="popular" class="bg-white" @if(old('php_sort') === 'popular' ) selected @endif>人気イベント順</option>
                        </select>
                    </div>
                    <div class="text-center mx-auto mt-3">
                        <button type="submit" class="btn site-btn text-white btn-block">絞り込む</button>
                        <!-- <button type="submit" class="btn btn-block btn-dark mt-3" name="reset">リセット</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-2 col-md-7 p-0 mb-4">
        <h2 class="title title-border pb-2">PHPイベント一覧</h2>
        <div class="mt-1">
            @if (!$lists->isEmpty())
            <a class="btn btn-default pr-5 pl-5 mb-3" href="">CSVダウンロード</a>
            @foreach($lists as $list)
            <ul class="list-unstyled event-card">
                <li class="pt-4 pl-4 pr-4"><a href="{{ $list->url }}" target="_blank" class="card-title">{{ $list->title }}</a></li>
                <li class="list-unstyled catch pl-4 pr-4">{{ $list->catch }}</li>
                <li class="list-unstyled mt-2 pl-4 pr-4">
                    <ul class="list-unstyled d-flex">
                        <li class="list-unstyled mr-3 pt-2 card-item"><i class="fa fa-fw fa-calendar-alt mr-2 text-dark"></i>{{ Str::substr($list->date, 5, 2) }}月{{ Str::substr($list->date, 8, 2) }}日 {{ $list->begin_time }}〜{{ $list->end_time }}</li>
                        <li class="card-item pt-2"><i class="fas fa-user mr-2 text-dark"></i>{{ $list->accepted }}@if($list->limit) / {{ $list->limit }}@endif人</li>
                    </ul>
                </li>
                <li class="list-unstyled pt-1 card-item pl-4 pr-4"><i class="fa fa-fw fa-map-marker-alt text-dark mr-2"></i>{{$list->address }}</li>
                <li class="pt-1 list-unstyled card-item border-bottom pl-4 pr-4 pb-3"><i class="fa fa-fw fa-users mr-2 text-dark"></i>{{ $list->group }}</li>
                <li class="list-unstyled mt-2 pb-2">
                    <ul class="list-unstyled d-flex justify-content-between">
                        <li class="pl-4 pr-4"><a href="#" class="like-button"><i class="fa fa-fw fa-heart mr-1 heart"></i>お気に入り</a></li>
                        <li class="pl-4 pr-4"><img class="connpass-logo" src="images/connpass_logo.png" alt=""></li>
                    </ul>
                </li>
            </ul>
            @endforeach
            <div class="text-center mt-4"> {{ $lists->links('pagination::bootstrap-4') }}</div>
            @else
            <p>検索結果は0件です。</p>
            @endif
        </div>
    </div>
</section>
@endsection