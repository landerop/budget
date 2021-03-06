@extends('layout')

@section('title', __('general.earnings'))

@section('body')
    <div class="wrapper my-3">
        <h2>{{ __('general.earnings') }}</h2>
        <div class="box mt-3">
            @if (count($earnings))
                @foreach ($earnings as $earning)
                    <div class="box__section row">
                        <div class="row__column">
                            <div class="color-dark">{{ $earning->description }}</div>
                            <div class="mt-1" style="font-size: 14px; font-weight: 600;">{{ $earning->formatted_happened_on }}</div>
                        </div>
                        <div class="row__column row__column--middle text-right" style="color: green;">&euro; {{ $earning->formatted_amount }}</div>
                    </div>
                @endforeach
            @else
                <div class="box__section text-center">You don't have any earnings</div>
            @endif
        </div>
    </div>
@endsection
