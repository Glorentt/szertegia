@extends('layouts.admin')

@section('title', 'All MLS')

@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function () {
        $('#sub_sales').addClass('active');
    });
</script>
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> <a href="{{route('admin.forms.index')}} ">MLS</a></h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Sales</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row" id="st">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-table"></i> All Sales by week</h3>

            </div>
            <div class="card-body">

                <div class="table-responsive" id="dada">
                    <table id="salessTable" class="table table-borderless table-hover display" >
                        <thead class="indigo white-text">
                            <tr>
                                <th class="center">id</th>
                                <th class="center">User name</th>
                                <th class="center">Sales</th>
                                <th class="center">Amount</th>
                                <th class="center">Action</th>

                            </tr>
                        </thead>
                        <tbody class="blue-grey lighten-5">
                            @foreach($users as $sale)
                            <tr id="{{$sale->id}}">
                                <td class="center">{{ $sale->id}}</td>
                                <td class="center">{{$sale->name }} </td>

                                @if($sale->sales != null)
                                
                                <td class="center">{{$sale->sales}}</td>
                                
                                <td> ${{ $sale->sales * 30 }}</td>
                                <td width="7%">
                                    <form method="POST" action="{{route('admin.sales.mls.add')}} ">
                                        <input type="hidden" value="{{$sale->id}}" name="id"/>
                                        <input type="submit" value="+1" class="btn btn-success btn-sm " />
                                        @csrf
                                    </form>
                                </td>
                                <td  style="padding-right: 0px; padding-left: 0px">
                                    <form method="POST" action="{{route('admin.sales.mls.minus')}} ">
                                        @csrf
                                        <input type="hidden" value="{{$sale->id}}" name="id"/>
                                        <input type="submit" value="-1" class="btn btn-warning btn-sm " />
                                    </form>
                                </td>
                                

                                @endif

                                @if($sale->sales == null)
                                <td class="center" >
                                    <div id='{{$sale->id}}' class="tdsale {{$sale->id}}">0</div>
                                </td>
                                <td> ${{ $sale->sales * 30 }}</td>
                                <td width="7%">
                                    <form method="POST" action="{{route('admin.sales.mls.add')}} ">
                                        <input type="hidden" value="{{$sale->id}}" name="id"/>
                                        <input type="submit" value="+1" class="btn btn-success btn-sm " />
                                        @csrf
                                    </form>
                                </td>
                                


                                <!-- <span class="btn btn-success btn-sm" onclick="addSale('{{$sale->id}}')" ><i class="fa fa-plus fa-sm" ></i></span> -->


                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table>
                        <tbody class="center">
                            <td class="center"></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection