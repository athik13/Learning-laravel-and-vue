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
                @foreach ($userAgents as $userAgent)
                <tr>
                    <td scope="row">{{ $userAgent->ip->ip }}</td>
                    @if ($userAgent->locations->isEmpty())
                        <td>{{ $userAgent->userAgent }}</td>
                    @else
                        <td>
                            <a href='{{ url("map/".$userAgent->id) }}'>
                                {{ $userAgent->userAgent }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $userAgent->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection