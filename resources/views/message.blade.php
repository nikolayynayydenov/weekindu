@extends('layouts.app')
@section('content')

<div class="container">
    <ul class="collection">
        @if(session()->has('successMessage'))
            <li class="collection-item success-color-text">
                {{ session()->get('successMessage') }}
            </li>
        @endif

        @if(session()->has('warningMessage'))
            <li class="collection-item warning-color-text">
                {{ session()->get('warningMessage') }}
            </li>
        @endif

        @if(session()->has('infoMessage'))
            <li class="collection-item info-color-text">
                {{ session()->get('infoMessage') }}
            </li>
        @endif

        @if(session()->has('dangerMessage'))
            <li class="collection-item danger-color-text">
                {{ session()->get('dangerMessage') }}
            </li>
        @endif
    </ul>
</div>

@endsection