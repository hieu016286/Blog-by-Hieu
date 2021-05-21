@extends('layouts.backend.app')

@section('title','Tag')

@push('css')
    
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EDIT TAG
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('admin.tag.update',$tag->id) }}" method="post">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" value="{{ $tag->name }}">
                                <label class="form-label">Tên Tag...</label>
                            </div>
                        </div>
                        <a href="{{ route('admin.tag.index') }}" class="btn btn-danger m-t-15 waves-effect">Quay Lại</a>
                        <input type="submit" value="Lưu" class="btn btn-primary m-t-15 waves-effect"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->
</div>
@endsection

@push('js')
    
@endpush