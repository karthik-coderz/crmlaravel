@extends('layouts.default')
@section('title')
    {{ __('app.deals.title') }}
@stop
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ __('app.deals.title') }}</h4>
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
                        <div class="col-md-6 d-flex">
                            <h4 class="card-title br-1">{{ __('app.deals.title') }}</h4>&emsp;
                            <select class="col-md-5 form-control" id="pipeline">
								<option>{{ __('app.deals.default-pipeline') }}</option>
								<option><i class="fa fa-plus"></i>{{ __('app.deals.add-pipeline') }}</option>
							</select>
                        </div>
                        <div class="col-md-6 d-flex">
                            <a class="btn btn-primary btn-round ml-auto" href = "{{ route('contact.create') }}"><i class="fa fa-plus"></i>{{ __('app.deals.create-title') }}</a>&emsp;
                            <input type="search" class="form-control form-control-sm" placeholder="{{ __('app.general.search') }}" >
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

                        <div class="items">
                            <div class="card border-1 item item1">
                            	<div class="card-header">
                            		<h4 class="card-title">{{ __('app.deals.appointment-schedule') }}</h4>
                            		<b><span class="text-success">0</span> - {{ __('app.deals.no-deal') }}</b>
                            	</div>
                            	<div class="card-body text-center">
                            		<i class="fas fa-plus-circle fa-3x text-primary p-3"></i>
                            	</div>
                            </div>
                            <div class="card border-1 item item2">
                            	<div class="card-header">
                            		<h4 class="card-title">{{ __('app.deals.qualified-buy') }}</h4>
                            		<b><span class="text-success">0</span> - {{ __('app.deals.no-deal') }}</b>
                            	</div>
                            	<div class="card-body text-center">
                            		<i class="fas fa-plus-circle fa-3x text-primary p-3"></i>
                            	</div>
                            </div>
                            <div class="card border-1 item item3">
                            	<div class="card-header">
                            		<h4 class="card-title">{{ __('app.deals.presentation-scheduled') }}</h4>
                            		<b><span class="text-success">0</span> - {{ __('app.deals.no-deal') }}</b>
                            	</div>
                            	<div class="card-body text-center">
                            		<i class="fas fa-plus-circle fa-3x text-primary p-3"></i>
                            	</div>
                            </div>
                            <div class="card border-1 item item4">
                            	<div class="card-header">
                            		<h4 class="card-title">{{ __('app.deals.decisionMaker-buyin') }}</h4>
                            		<b><span class="text-success">0</span> - {{ __('app.deals.no-deal') }}</b>
                            	</div>
                            	<div class="card-body text-center">
                            		<i class="fas fa-plus-circle fa-3x text-primary p-3"></i>
                            	</div>
                            </div>
                            <div class="card border-1 item item5">
                            	<div class="card-header">
                            		<h4 class="card-title">{{ __('app.deals.contract-sent') }}</h4>
                            		<b><span class="text-success">0</span> - {{ __('app.deals.no-deal') }}</b>
                            	</div>
                            	<div class="card-body text-center">
                            		<i class="fas fa-plus-circle fa-3x text-primary p-3"></i>
                            	</div>
                            </div>
                            <div class="card border-1 item item6">
                            	<div class="card-header">
                            		<h4 class="card-title">{{ __('app.deals.closed-won') }}</h4>
                            		<b><span class="text-success">0</span> - 1 {{ __('app.deals.title') }}</b>
                            	</div>
                            	<div class="card-body text-center">
                            		<i class="fas fa-plus-circle fa-3x text-primary p-3"></i>
                            		<div class="card border-1  text-left">
		                            	<div class="card-header pl-2 pr-2">
		                            		<h4 class="card-title">Oxigreen</h4>
		                            		<b><span class="text-muted">{{ __('app.general.inr') }} 0</span></b>
		                            	</div>
		                            	<div class="card-body text-muted">
		                            		<b><i class="fas fa-clock"></i> 0 {{ __('app.general.activities') }}</b>
		                            		<b class="pull-right"><i class="fas fa-chevron-right"></i></b>
		                            	</div>
		                            </div>
                            	</div>
                            </div>
                            <div class="card border-1 item item7">
                            	<div class="card-header">
                            		<h4 class="card-title">{{ __('app.deals.closed-lost') }}</h4>
                            		<b><span class="text-success">0</span> - {{ __('app.deals.no-deal') }}</b>
                            	</div>
                            	<div class="card-body text-center">
                            		<i class="fas fa-plus-circle fa-3x text-primary p-3"></i>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	const slider = document.querySelector('.items');
  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
  });

  slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
  });

  slider.addEventListener('mousemove', (e) => {
    if (!isDown) return;  // stop the fn from running
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3;
    slider.scrollLeft = scrollLeft - walk;
  });

</script>
@stop
