@extends("admin.layouts.app")
@section("content")


            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Edit Blog</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                  
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <form class="form-horizontal form-material" action="{{ route('update_blog', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('success')}}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @break
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                                <div class="form-group">    
                                    <label for="">Title <label style="color:red" for="">(*)</label></label>
                                    <div class="col-md-12">
                                        <input type="text" name="title" class="form-control form-control-line" value="{{ $blog->title }}">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <div class="col-md-12">
                                        <input type="file" name="avatar" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <div class="col-md-12">
                                    <textarea name="description" class="form-control form-control-line" value=""  style="height: 100px;">{{ $blog->description }}</textarea>
                                   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <div class="col-md-12">
                                    <textarea name="content" class="form-control form-control-line" value="" id="editor" style="height: 100px;">{{ $blog->content }}</textarea>
                                   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-success" value="Edit Blog"></input>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebssar -->
                <!-- ============================================================== -->
            </div>
            
            
@endsection