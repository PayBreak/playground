@extends('skeleton')

@section('before-body-close')
<script src="{{ mix('/js/app.js') }}"></script>

@endsection

@section('content')
    <div>There's nothing here</div>

    <p>Except:</p>
    <div class="field is-horizontal is-marginless">
        <div class="field-label">
            <label class="label">How's it going</label>
        </div>
        <div class="field-body">
            <div class="field is-narrow">
                <div class="control">
                    Going well
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal is-marginless">
        <div class="field-label">
            <label class="label">Any danger?</label>
        </div>
        <div class="field-body">
            <div class="field is-narrow">
                <div class="control">
                    <span class="tag is-danger">Bare danger</span>
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label">
            <label class="label">Why is there a margin?</label>
        </div>
        <div class="field-body">
            <div class="field is-narrow">
                <div class="control">
                    No <code>is-marginless</code> class
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label">
            <label class="label">Already a member?</label>
        </div>
        <div class="field-body">
            <div class="field is-narrow">
                <div class="control">
                    wut
                </div>
            </div>
        </div>
    </div>
@endsection
