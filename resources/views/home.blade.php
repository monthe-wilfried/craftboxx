@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card" style=" margin: auto; margin-top: 5rem">
                @include('includes.flash_message')
                <div class="card-header"><h1>Tabelle für Kunden</h1></div>

                <div class="card-body">
                    <span class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 1em"><i class="fa fa-plus"></i> Neu Hinzufügen</span>
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
                        @if(count($kunden) == 0)
                            <tr>
                                <th></th>
                                <th></th>
                                <th><span class="text-center">Die Tabelle ist leer.</span></th>
                                <th></th>
                                <th></th>
                            </tr>
                        @else
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
                        @endif
                        </tbody>
                    </table>
                    <div>
                        <span>{{ $kunden->render() }}</span>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Neu Kunde</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('kunde.store') }}" method="post">
                                @csrf

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="vorname">Vorname:</label>
                                        <input type="text" name="vorname" class="form-control" placeholder="Geben Sie Ihren Vornamen ein">
                                        @if($errors->has('vorname'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ $errors->first('vorname') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="vorname">Nachname:</label>
                                        <input type="text" name="nachname" class="form-control" placeholder="Geben Sie Ihren Nornamen ein">
                                        @if($errors->has('nachname'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ $errors->first('nachname') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="gewerblicher_kunde">
                                        <label for="gewerblicher_kunde">Gewerblicher Kunde?</label>
                                        @if($errors->has('gewerblicher_kunde'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ $errors->first('gewerblicher_kunde') }}
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                                    <button type="submit" class="btn btn-primary">Erstellen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
