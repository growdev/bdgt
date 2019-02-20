@extends('app')

@section('breadcrumbs.items')
    <li class="active">{{ trans('labels.import.singular') }}</li>
@endsection

<?php /*
@section('breadcrumbs.actions')
    <a href="#addGoalModal" data-toggle="modal" class="{{ config('layout.create_button_class') }}"><i class="fa fa-plus"></i> {{ trans('labels.goals.add_button') }}</a>
@endsection

*/ ?>

@section('content')

    <h2>Import Transactions</h2>
    @if(session()->get('message'))
        <div class="alert alert-{{ session()->get('status') }}">
            {{ session()->get('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('import.upload') }}" aria-label="Import" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <input type="file" name="myfile" id="myfile" />
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Upload') }}
                </button>
            </div>
        </div>
    </form>

@endsection