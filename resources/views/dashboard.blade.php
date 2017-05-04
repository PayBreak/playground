@extends('skeleton')

@section('before-body-close')
<script src="{{ mix('/js/app.js') }}"></script>
@endsection

@section('content')
<section class="hero">
    <consumers></consumers>
</section>
@endsection
