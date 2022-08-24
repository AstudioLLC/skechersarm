@extends('layouts.admin')


@section('content')
{{--<div class="row">--}}
{{--    <div class="col-lg-12 margin-tb">--}}
{{--        <div class="pull-right">--}}
{{--        @can('role-create')--}}
{{--                <a href="{{route('roles.create')}}">--}}
{{--                    <button type="button" class="btn bg-gradient-success btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to create" data-container="body" data-animation="true">Create new Role</button>--}}
{{--                </a>--}}
{{--            @endcan--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--@if ($message = Session::get('success'))--}}
{{--    <div class="alert alert-success">--}}
{{--        <p>{{ $message }}</p>--}}
{{--    </div>--}}
{{--@endif--}}


{{--<table class="table table-bordered">--}}
{{--  <tr>--}}
{{--     <th>No</th>--}}
{{--     <th>Name</th>--}}
{{--     <th width="280px">Action</th>--}}
{{--  </tr>--}}
{{--    @foreach ($roles as $key => $role)--}}
{{--    <tr>--}}
{{--        <td>{{ ++$i }}</td>--}}
{{--        <td>{{ $role->name }}</td>--}}
{{--        <td>--}}
{{--            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>--}}
{{--            @can('role-edit')--}}
{{--                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>--}}
{{--            @endcan--}}
{{--            @can('role-delete')--}}
{{--                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}--}}
{{--                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
{{--                {!! Form::close() !!}--}}
{{--            @endcan--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}


{{--{!! $roles->render() !!}--}}



<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Management</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Roles</li>
            </ol>
        </nav>
    </div>
</nav>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <a href="{{route('roles.create')}}">
                <button type="button" class="btn btn-light py-3 px-5 text-black w-100 mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to create" data-container="body" data-animation="true">Create new Roles</button>
            </a>
            <div class="card mb-4">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-center text-uppercase text-center  font-weight-bolder opacity-7"><i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$role->id}}</h6>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$role->name}}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="px=2" href="{{ route('roles.show',$role->id) }}">
                                            <i class="fa fa-eye" title="Show"></i>
                                        </a>
                                        @can('role-edit')
                                            <a class="px-2" href="{{ route('roles.edit',$role->id) }}">
                                                <i class="fa fa-edit" title="Edit"></i>
                                            </a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'fa fa-trash']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {!! $roles->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
