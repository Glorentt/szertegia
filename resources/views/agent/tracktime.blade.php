@extends('layouts.agent')

@section('title', 'TrackTimes')

@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function () {
        $('#sub_dashboard').addClass('active');
    });

</script>
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">TrackTime {{ Session('rol') }}</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Track time</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2 col-xl-2">
        <div class="card-header noradius noborder bg-default" id="divactive">
            <a id="active" href="javascript:void(0);" onclick="active();">
                <i class="fa fa-play fa-2x float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Active</h6>
                <div class="text-white form-group">
                @if($time == null)
                    <p id="activeTime">00:00:00</p>
                @endif
                @if($time != null)
                    <p id="activeTime">{{$time}}</p>
                @endif
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-2 col-md-2 col-lg-2 col-xl-2">
        <div class="card-header noradius noborder bg-default">
            <a href="javascript:void(0);" onclick="pause();">
                <i class="fa fa-pause fa-2x float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Break</h6>
                <!-- <h1 class="m-b-20 text-white counter">00:00</h1> -->
                <p id="break" class="text-white">00:00:00</p>
            </a>
        </div>
    </div>
    <div class="col-xs-2 col-md-2 col-lg-2 col-xl-2">
        <div class="card-header noradius noborder bg-default">
            <a href="javascript:void(0);" onclick="out();">
                <i class="fa fa-stop fa-2x float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Out</h6>
                <h3 class="m-b-10 text-white counter">log out</h3>
            </a>
        </div>
    </div>
    <input type="hidden" value="{{ Session('id')}}" id="userId" />

</div>

<!-- end row -->


<script>
    var time
    
    var timeout = 0
    function incrementActiveTime(){
        

        var actual = document.getElementById('activeTime').innerHTML;
        var array = actual.split(':');
        var seconds = array[2];
        var minutes = array[1];
        var hours = array[0];
        
        seconds = parseInt(seconds)
        minutes = parseInt(minutes)
        hours = parseInt(hours)
        seconds = seconds + 1;
        if (seconds > 59) {
            seconds = 00
            minutes = minutes + 1
            save();
        }
        if (minutes > 59) {
            minutes = 00
            hours = hours + 1
        }
       
        document.getElementById('activeTime').innerHTML =  hours + ":" + minutes + ":" + seconds
        time = setTimeout(incrementActiveTime, 1000);
    }
    
    function active(exit = null) {
        if (exit != null) {
            return;
        }
        clearTimeout(time)
        pause("exit");
        
        
        $('#active').removeAttr("onclick");


        if (document.getElementById("divactive").classList.contains('bg-default')) {
            document.getElementById("divactive").classList.remove('bg-default');
            document.getElementById("divactive").classList.add('bg-success');
        }
        incrementActiveTime();
    }

    function incrementBreak() {
        
        var actual = document.getElementById('break').innerHTML;
        var array = actual.split(':');
        var seconds = array[2];
        var minutes = array[1];
        var hours = array[0];
        
        seconds = parseInt(seconds)
        minutes = parseInt(minutes)
        hours = parseInt(hours)
        seconds = seconds + 1;
        if (seconds > 59) {
            seconds = 00
            minutes = minutes + 1
            save();

        }
        if (minutes > 59) {
            minutes = 00
            hours = hours + 1
        }
      
        document.getElementById('break').innerHTML = hours + ":" + minutes + ":" + seconds
        time = setTimeout(incrementBreak, 1000);

    }

    function pause(exit = null) {
        if (exit != null) {
            return;
        }
//donde es
        if (!document.getElementById("divactive").classList.contains('bg-success')) {
            return;
        }

        clearTimeout(time)
        active("exit");
        
        document.getElementById('active').setAttribute('onclick', 'active()')
        if (document.getElementById("divactive").classList.contains('bg-success')) {
            document.getElementById("divactive").classList.contains('bg-success')
            document.getElementById("divactive").classList.add('bg-default')

        }
        while (!commentario) {
            var commentario = prompt("insert why did you pause")
        }
        $('#break').removeAttr("onclick");
        incrementBreak()

    }

    function out(){

        clearTimeout(time)
        active("exit");
        pause("exit");
        save()
        
        
    }
</script>
<script>

    function saveBreak() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var activetime = document.getElementById('activeTime').innerHTML;
        var userid = document.getElementById('userId').value;

        $.ajax({
            method: "post",
            url: "tracktime/pause",
            data: {
                active: activetime,
                comment: commentario,
                id: userid
            }
        })
    }


    function save() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var activetime = document.getElementById('activeTime').innerHTML;
        var userid = document.getElementById('userId').value;

        $.ajax({
            method: "post",
            url: "tracktime",
            data: {
                active: activetime,
                id: userid
            }
        })
    }

</script>
@endsection