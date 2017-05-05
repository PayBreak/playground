@extends('skeleton')

@section('before-body-close')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js" charset="utf-8"></script>
<script src="{{ mix('/js/app.js') }}"></script>

@endsection

@section('content')
    <app></app>
@endsection
