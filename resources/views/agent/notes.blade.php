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
</div>
  <div class="row">
                <div class="col-md-5">
                                <form>
                                  <h3>Create a note</h3>
                                 @csrf
                                
                                 <textarea class="form-control col-md-12" 
                                 name="comment" placeholder="Escribe una nota"
                                 id="TextNote" cols="60" rows="5"></textarea>
                                
                                 <button class="mt-2 btn btn-success btn-lg btn-block text-center" 
                                 acction="submit">Save</button>
                                </form>
                                
                        </div>
                <div class="col-md-7 mt-4"> 
                        @if(isset($notes))
                   
                                @foreach ($notes as $key=>$note)

                                        <div taskId="{{$note->id}}"class="card card-default mt-2">
                                                <div class="card-header">
                                                <h3 class="col card-title">Note 
                                                        <a class="float-right btn btn-danger" 
                                                        onclick="return confirm('Are you sure you want delete this note?')" 
                                                        href="{{route('agent.notes.destroy.paco', $note->id)}}"  data-method="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                </h3>
                                                </div>
                                                <div class="card-body">
                                                        <p>{{ $note->Comment }}</p>
                                                </div>
                                        </div>
                               
                                @endforeach
                        
                        @endif
                        </div>
                </div>
                        
  </div>
        
        
        <div>
       
        

</form>
<!-- end row -->


@endsection