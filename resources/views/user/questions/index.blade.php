@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Questions</h1>
            <div class="card">
                <div class="card-body">
                    <!-- Content goes here -->
                    <p>Welcome to the questions page</p>
                    <a href="{{ route('user.questions.show') }}" class="btn btn-primary">
                        View Questions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection