@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box" style="margin-left: 3%">
                    <div class="box-header with-border">
                        <h4 class="box-title">Cập nhật người đọc</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('reader.update',$reader->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Họ tên <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                   value="{{ $reader->name }}" required=""></div>
                                                    </div>

                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Địa chỉ Email </h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                   value="{{ $reader->email }}" required=""></div>
                                                    </div>
                                                </div><!-- End Col Md-6 -->

                                            </div> <!-- End Row -->

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Số điện thoại <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="phone" class="form-control"
                                                                   value="{{ $reader->phone }}" required=""></div>

                                                    </div>
                                                    <div class="form-group" >
                                                        <h5>Mã sinh viên <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="student_code"
                                                                   class="form-control"
                                                                   value="{{ $reader->student_code }}" required="">
                                                        </div>

                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Chọn lớp <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="class_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">Chọn đơn vị lớp
                                                                </option>
                                                                @foreach($classes as $class)
                                                                    <option
                                                                        value="{{ $class->id }}" {{ ($reader->class_id == $class->id)? "selected":"" }} >{{ $class->name_school_year }}
                                                                        - {{ $class->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div><!-- End Col Md-6 -->

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Địa chỉ</h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control"
                                                                   value="{{ $reader->address }}" required=""></div>

                                                    </div>

                                                </div><!-- End Col Md-6 -->


                                            </div> <!-- End Row -->


                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Giới tính <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                    class="form-control">
                                                                <option value="" selected="" disabled="">Chọn giới tính</option>
                                                                <option value="Nam" {{ ($reader->gender == "Nam" ? "selected": "") }}  >Nam</option>
                                                                <option value="Nữ" {{ ($reader->gender == "Nữ" ? "selected": "") }} >Nữ</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                {{--                                                <div class="col-md-6" >--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        <h5>Ảnh đại diện <span class="text-danger">*</span></h5>--}}
                                                {{--                                                        <div class="controls">--}}
                                                {{--                                                            <input type="file" name="image" class="form-control" id="image" >  </div>--}}
                                                {{--                                                    </div>--}}

                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        <div class="controls">--}}
                                                {{--                                                            <img id="showImage" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">--}}

                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}


                                                {{--                                                </div><!-- End Col Md-6 -->--}}


                                            </div> <!-- End Row -->


                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                       value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>


        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection
