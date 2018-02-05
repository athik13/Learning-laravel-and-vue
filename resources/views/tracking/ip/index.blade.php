@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table class="table table-bordered table-responsive">
            <thead class="thead-default">
                <tr>
                    <th>Ip</th>
                    <th>Browser Agent</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($browserAgents as $browserAgent)
                <tr>
                    <td scope="row">{{ $browserAgent->ip->ip }}</td>
                    <td>{{ $browserAgent->browserAgent }}</td>
                    <td>{{ $browserAgent->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection