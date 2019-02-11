@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="height: 50px;">
                        <span>
                            User List
                        </span>
                        <span style="float:right">
                            <a href="{{URL :: asset('user/create')}}" title="Create New" class="btn btn-info">
                                Create New &nbsp;&nbsp;<i class="fa fa-plus"></i>
                            </a>
                        </span>
                    </div>
                    <div class="panel-body">
                        <table class="tg">
                            <tr>
                                <th class="tg-0pky">Id</th>
                                <th class="tg-0pky">Name</th>
                                <th class="tg-0pky">Email</th>
                                <th class="tg-0pky">Created At</th>
                                <th class="tg-0pky">Status</th>
                                <th class="tg-0pky">Action</th>
                            </tr>

                            @foreach($users as $key => $value)
                                <tr>
                                    <td class="tg-0pky">{{ $value->id }}</td>
                                    <td class="tg-0pky">{{ $value->name }}</td>
                                    <td class="tg-0pky">{{ $value->email }}</td>
                                    <td class="tg-0pky">{{ date('d M Y H:i A',strtotime($value->created_at)) }}</td>
                                    <td class="tg-0pky">
                                        @if($value->status == 1)
                                            Active
                                        @elseif($value->status == 0)
                                            Inactive
                                        @endif
                                    </td>
                                    <td class="tg-0pky">
                                        <a href="{{URL :: asset('user/'.$value->id)}}/edit" title="Edit" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;width: 100%}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
    </style>

@endsection