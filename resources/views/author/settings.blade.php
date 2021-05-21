@extends('layouts.backend.app')

@section('title','Settings')

@push('css')
    
@endpush

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    SETTINGS
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home_only_icon_title" data-toggle="tab">
                            <i class="material-icons">face</i>
                            &nbsp;<span>Thông Tin Cá Nhân</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#change_password_with_icon_title" data-toggle="tab">
                            <i class="material-icons">change_history</i>
                            &nbsp;<span>Mật Khẩu</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home_only_icon_title">
                        <form method="POST" action="{{ route('author.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="name">Name :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <label for="email">Email :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email" placeholder="Enter your email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <label for="image">Image :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <img id="showImage"
                                 src="{{ !empty(Auth::user()->image) ? url('upload/profile/'.Auth::user()->image) : "" }}" 
                                 alt="" 
                                 style="width: 150px; height: 160px; border: 1px solid #000;">
                            </div>
                            <label for="about">About :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="about" cols="30" rows="10">{{ Auth::user()->about }}</textarea>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cập Nhật</button>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="change_password_with_icon_title">
                        <form method="POST" action="{{ route('author.password.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="old_password">Mật Khẩu Cũ :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="old_password" class="form-control" placeholder="Enter your password">
                                </div>
                            </div>
                            <label for="password">Mật Khẩu Mới :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" placeholder="Enter your new password">
                                </div>
                            </div>
                            <label for="password_confirmation">Nhập Lại Mật Khẩu :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter your new password again">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cập Nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Tabs With Only Icon Title -->
@endsection


@push('js')
<script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      })
    })
</script>
@endpush