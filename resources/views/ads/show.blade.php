@extends('ads.layout')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Ads</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('ads.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $ad->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                {{ $ad->description }}

            </div>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Date:</strong>

            {{ $ad->publication_date }}

        </div>

    </div>

</div>

@endsection