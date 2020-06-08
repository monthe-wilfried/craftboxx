@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row align-content-center">
        <div class="card" style="margin-top: 10rem;">
            <div class="card-header"><h1>Tabelle für Kunden</h1></div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vorname</th>
                        <th scope="col">Nachname</th>
                        <th scope="col">Gewerblicher Kunde</th>
                        <th scope="col">Datum</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kunden as $key => $kunde)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <th>{{ $kunde->vorname }}</th>
                            <th>{{ $kunde->nachname }}</th>
                            <th>
                                @if($kunde->gewerblicher_kunde == 0)
                                    <span>Nein</span>
                                @elseif($kunde->gewerblicher_kunde == 1)
                                    <span>Ja</span>
                                @endif
                            </th>
                            <th>{{ $kunde->created_at->diffForHumans() }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <span>{{ $kunden->render() }}</span>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
