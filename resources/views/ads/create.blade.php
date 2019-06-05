@extends('ads.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-center">

            <h2>Add New AD</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('ads.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('ads.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

         
                <input type="text" name="title" class="form-control" placeholder="Title" maxlength="50">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

             
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>

            </div>

        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
    
                    
                    <input type="date" name="publication_date" class="form-control" placeholder="Publication Date">
    
                </div>
    
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>
    
            </div>
    

    </div>

   

</form>

@endsection