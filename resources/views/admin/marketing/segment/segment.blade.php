@extends('layouts.default')
@section('title')
    {{ __('app.segment.title') }}
@stop
@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ __('app.dashboard.marketing') }}</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('/dashboard')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title">{{ __('app.segment.selist') }}</h4>
                            </div>
                            <div class="col-md-6 d-flex">
                                <!-- <a class="btn btn-primary btn-round ml-auto" href = "#updatePeopleModal" data-target="#updatePeopleModal" data-toggle="modal" ><i class="fa fa-upload"></i>{{ __('app.contacts.organization.upload-title') }}</a> -->
                                <a class="btn btn-primary btn-round ml-auto mr-2 mb-2" href = "{{ route('segment.create') }}"><i class="fa fa-plus"></i>
                                {{ __('app.segment.create-title') }}</a>
                                <input type="search" class="form-control form-control-sm" placeholder="Search">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="updatePeopleModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            {{ __('app.general.upload') }} </span> 
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12 mb-2">
                                                    <label>{{ __('app.general.choose') }}</label>
                                                    <input type="file" name="uploadPeople" class="form-control">
                                                </div>
                                                <div class="col-sm-12 mb-2">
                                                    <label>{{ __('app.general.sample') }}</label><br>
                                                    <button type="button" class="btn btn-primary">{{ __('app.general.dsample') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer border-0 d-flex align-items-center">
                                        <button type="button" id="addRowButton" class="btn btn-primary">{{ __('app.general.submit') }}</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('app.general.cancel') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            {{ __('app.contacts.organization.create-title') }} </span> 
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @include('includes.flash-message')
                            <table class="table table-striped table-inverse">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>{{ __('app.general.id') }}</th>
                                        <th>{{ __('app.general.name') }}</th>
                                        <th>{{ __('app.general.description') }}</th>
                                        <th>{{ __('app.general.created_date') }}</th>
                                        <th>{{ __('app.general.unsubscribed') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($segments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>-</td>
                                        <td>
                                            <div class="avatar-group">
                                                <div class="avatar">
                                                    <i class="far fa-user-circle fa-3x avatar-img rounded-circle border border-white"></i>
                                                </div>
                                                <div class="avatar">
                                                    <i class="far fa-user-circle fa-3x avatar-img rounded-circle border border-white"></i>
                                                </div>
                                                <div class="avatar">
                                                    <span class="avatar-title bg-primary rounded-circle border border-white">+52</span>
                                                </div>
                                                <b class="text-center mt-2 p-2">54 Members</b>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-primary" data-toggle="dropdown">
                                                        <i class="text-center fa-2x mt-2 p-2 fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item text-warning" href="#">
                                                            <i class="fas fa-edit">&nbsp;Edit</i>
                                                        </a>
                                                        <a class="dropdown-item text-info" href="#">
                                                            <i class="fas fa-copy">&nbsp;Copy</i>
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="fas fa-trash">&nbsp;Delete</i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($segments->links()->paginator->hasPages())
                                <!-- <div class="mt-4 p-4 box has-text-centered"> -->
                                <div class="mt-4 p-4 box has-text-centered">
                                    {!! $segments->appends(['sort' => 'created_at'])->links() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
