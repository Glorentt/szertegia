@extends('layouts.agent')

@section('title', 'Dashboard')



@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function(){
        $('#sub_dashboard').addClass('active');
    });
    
</script>
<div class="row">
    <div class="col-xl-12">
            <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Notes {{ Session('rol') }}</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Notes</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>
</div>
                        <!-- end row -->

<form action="{{ route('agent.note.store')}}" method="POST">
<div class="row justify-content-md-center">
  <h2 >Keep your notes safe</h2>
  
        <div class="col-md-12">
        @csrf
                <textarea class="form-control offset-md-4 col-md-4" name="comment" id="" cols="" rows=""></textarea>
        </div>
        <div class="">
                <button class="btn btn-success btn-lg" acction="submit">Save</button>
        </div>

        
        @if(isset($notes))
        <div class="col-md-12 offset-md-6">
        
        <br> <br>
                @foreach ($notes as $key=>$note)
                <div class="col-md-4">
                        <p>Note:->{{ $note->Comment }}</p>
                </div>
                @endforeach
        </div>
        @endif
        
</div>
</form>



<!-- end row -->



@endsection