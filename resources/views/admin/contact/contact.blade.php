@extends('layouts.default')
@section('title')
    {{ __('app.contacts.person.title') }}
@stop
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ __('app.contacts.person.title') }}</h4>
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
                    <div class="card-header row">
                        <div class="col-md-7">
                            <h4 class="card-title">{{ __('app.contacts.person.clist') }}</h4>
                        </div>
                        <div class="col-md-5">
                            <a class="btn btn-primary btn-round ml-auto" href = "#updatePeopleModal" data-target="#updatePeopleModal" data-toggle="modal" ><i class="fa fa-upload"></i>{{ __('app.contacts.person.upload-title') }}</a>
                            <a class="btn btn-primary btn-round ml-auto" href = "{{ route('contact.create') }}"><i class="fa fa-plus"></i>{{ __('app.contacts.person.add-title') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="deleteConfModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            {{ __('app.contacts.person.dlist') }} </span> 
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>{{ __('app.general.deleteMessage') }}</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer border-0 text-center">
                                        <a href="#">
                                            <button type="button" id="addRowButton" class="btn btn-primary">{{ __('app.general.delete') }}</button>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('app.general.cancel') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="updatePeopleModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            {{ __('app.contacts.person.upload-title') }} </span> 
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
                                                    <span><input type="file" name="uploadPeople" class="form-control"></span>
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

                        <div class="table-responsive">
                            <table class="display table table-striped table-hover">
                                @include('includes.flash-message')
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No</th>
                                        <th>Organization Name1</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Visiblity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($contacts as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->organization->name??'-' }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>-</td>
                                            <td>
                                            <a href="{{ route('contact.edit',$item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a> 
                                            |
                                            <a class="text-danger" data-toggle="modal" data-target="#deleteConfModal">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                            </table>
                            @if ($contacts->links()->paginator->hasPages())
                                <div class="d-flex justify-content-center">
                                <!-- <div class="mt-4 p-4 box has-text-centered"> -->
                                    {!! $contacts->appends(['sort' => 'created_at'])->links() !!}
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
