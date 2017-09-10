@extends('layout')

@section('body')
    <div class="row spacing-bottom-large">
        <div class="column align-middle">
            <h1>Spendings</h1>
        </div>
        <div class="column align-right">
            <a href="/spendings/create" class="button">Create</a>
        </div>
    </div>
    <div class="box">
        <table>
            <tbody>
                @foreach ($spendings as $spending)
                    <tr>
                        <td>{{ date('F jS, Y', strtotime($spending->date)) }}</td>
                        <td>{{ $currency->symbol }} {{ $spending->amount }}</td>
                        <td>{{ $spending->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection