@extends('layouts.app')

@section('content')
    
    <div class="row">
        @for ($i = 0; $i < 6; $i++)
        <div class="col-md-3">
            <app-card title="Title" text="Lorem"></app-card>    
        </div>
        @endfor
    </div>

@endsection