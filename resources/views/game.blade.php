@extends('layouts.main')

@section('title', "Game")

@section('body')
    <div class="container">
        <div>
            Link: {{ url('/') }}/link/<span id="this-link">{{ $link->id }}</span>
            <input type="hidden" value="{{ url('/') }}/link/{{ $link->id }}" id="copyLinkValue">

            <button id="btn-copy-link" class="btn">Copy</button>
            <button id="new-link" class="btn">New link</button>
            <button id="deactivate" class="btn">Deactivate</button>
        </div>
        <div>
            <button id="rate" class="btn-dark">Im feeling lucky</button>
            <button id="history" class="btn-dark">History</button>
        </div>
        <div class="m-2 col-md-8 row">
            <div class="p-5 border col-md-6">
                <span id="lucky-result"></span>
            </div>

            <div id="history-show" class="p-3 d-none border col-md-6">
                <h3>History</h3>
                <div id="history-items">

                </div>
            </div>
        </div>
    </div>
@endsection