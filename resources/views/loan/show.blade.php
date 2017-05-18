@extends('skeleton')

@section('before-body-close')
    <script src="{{ mix('/js/app.js') }}"></script>

@endsection

@section('content')
    <loan-show :account-number="{!! Request::segment(2) !!}"></loan-show>
@endsection
