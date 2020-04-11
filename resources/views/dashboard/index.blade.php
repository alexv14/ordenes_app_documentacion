@extends('layouts.dashboard.app')

@section('title', 'Home')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class=" ">
        <div class="container-fluid mt-n5">
            <div class="row align-items-center py-4">
                <div class="col-12">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        card
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection