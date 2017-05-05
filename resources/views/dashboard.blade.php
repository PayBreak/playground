@extends('skeleton')

@section('before-body-close')
<script src="{{ mix('/js/app.js') }}"></script>

@endsection

@section('content')
    <app></app>
@endsection
