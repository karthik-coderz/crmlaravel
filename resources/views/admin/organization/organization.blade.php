@extends('layouts.default')
@section('title')
    {{ __('app.contacts.organization.title') }}
@stop
@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ __('app.contacts.organization.title') }}</h4>
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
                            <div class="col-md-7">
                                <h4 class="card-title">{{ __('app.contacts.organization.olist') }}</h4>
                            </div>
                            <div class="col-md-5">
                                <a class="btn btn-primary btn-round ml-auto" href = "#updatePeopleModal" data-target="#updatePeopleModal" data-toggle="modal" ><i class="fa fa-upload"></i>{{ __('app.contacts.organization.upload-title') }}</a>
                                <a class="btn btn-primary btn-round ml-auto" href = "{{ route('organization.create') }}"><i class="fa fa-plus"></i>
                                {{ __('app.contacts.organization.create-title') }}</a>
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
                                                    <label>{{ __('app.general.sample') }}</label>
                                                    <span><a href="#" >{{ __('app.general.dsample') }}</a></span>
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
                                        <th>{{ __('app.contacts.organization.person_count') }}</th>
                                        <th>{{ __('app.general.created_date') }}</th>
                                        <th>{{ __('app.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($organizations as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->contacts->count() }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                            <a href="{{ route('organization.edit',$item->id) }}"><i class="fa fa-edit"></i></a> 
                                            |
                                            <a class="text-danger" href="{{ route('organization.delete',$item->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                            </table>
                            @if ($organizations->links()->paginator->hasPages())
                                <!-- <div class="mt-4 p-4 box has-text-centered"> -->
                                <div class="mt-4 p-4 box has-text-centered">
                                    {!! $organizations->appends(['sort' => 'created_at'])->links() !!}
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
