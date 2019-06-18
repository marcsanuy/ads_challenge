@extends('ads.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-center">

                <h2>ADS</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('ads.create') }}"> Create New Ad</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Title</th>

            <th>Description</th>

            <th>Publication Date</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($ads as $ad)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $ad->title }}</td>

            <td>{{ $ad->description }}</td>

            <td>{{ $ad->publication_date }}</td>

            <td>

                <form action="{{ route('ads.destroy',$ad->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('ads.show',$ad->id) }}">Show</a>

    


   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $ads->links() !!}

      

@endsection