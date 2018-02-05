@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-responsive">
                <thead class="thead-default">
                    <tr>
                        <th>Ip</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ips as $ip)
                        <tr>
                            <td scope="row">{{ $ip->ip }}</td>
                            <td>{{ $ip->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>

@endsection