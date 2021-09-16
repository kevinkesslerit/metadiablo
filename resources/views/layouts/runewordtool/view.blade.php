@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rune Word Tool (beta)</div>

                    <div class="card-body">

                            <div class="row">
                                <div class="col col-form-label text-center">
                                    <h5>
                                        Possible Rune Words
                                    </h5>
                                    <p>This tool is meant for use with <a target="_blank" href="https://us.shop.battle.net/en-us/product/diablo-ii-lord-of-destruction">Diablo II: Lord of Destruction</a>. This is a list of Rune Words you <em>could</em> make.<br><a href="{{ route('rwtool') }}">Click here</a> to search again.</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col pr-1">
                                    @foreach ($matches as $key => $match)
                                        <b><span style="color: #908858;">{{ $key }}</span></b> <br>
                                        <b>First Rune Match:</b> <em><img src="{{ asset('img/runes/'.$match['first_match'].'.png') }}" alt="{{ $match['first_match'] }} Rune" /> {{ $match['first_match'] }}</em> <br>
                                        <b>Rune Order:</b> <em>{{ $match['rune_order'] }}</em> <br>
                                        <b>Ladder Only:</b> {{ $match['ladder_only'] }} <br>
                                        <b>Patch Introduced:</b> {{ $match['patch_introduced'] }} <br>
                                        <b>Allowed Items:</b> {{ $match['allowed_items'] }} <br>
                                        <span style="color: #4850B8;">{!! $match['rune_word_stats'] !!}</span>
                                        <br>
                                    @endforeach
                                        <br><a href="{{ route('rwtool') }}">Click here</a> to search again.
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
