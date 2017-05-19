<div class="col-md-3">
    <div class="">
            <div class="list-group">
            <a href="{{route('producttypes.index')}}" class="list-group-item {{ Request::is('settings/producttypes') ? 'active' : '' }}">
            	{{trans('application.product_type')}}
            </a>
       		</div>
    </div>
</div>