@extends("admin.layouts.app")
@section("content")
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Creat brand</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create brand</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
             
                <div class="row">
             
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">

                <form class="form-horizontal form-material" action="{{ route('create_brand') }}" method="POST">
                    @csrf
                   @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thêm thành công!</h4>
                                    {{session('success')}}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Lỗi!</h4>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                     <div class="form-group">
                        <label for="">ID Brand <label style="color:red" for="">(*)</label></label>
                        <div class="col-md-12">
                            <input type="text" name="id_brand" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Name <label style="color:red" for="">(*)</label></label>
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-success" value="Create brand">
                        </div>
                    </div>
                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
           
            </div>
@endsection