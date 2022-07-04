@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Chiave</th>
                                <th>Dato</th>
                            </tr>
                            @foreach($dato_utente as $k => $v)
                                <tr>
                                    <td>{{$k}}</td>
                                    <td>{{$v}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
