@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper ">
        <div class="container-full card card-primary" style="margin-left: 5%; margin-right: 5%">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="card-header with-border" style="background-color: #0c84ff; color: white">

                        <h2 class="card-title">Cập nhật yêu cầu mượn sách</h2>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="margin-left: 2%; margin-top: 2%;">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('borrow.update',$borrow->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                                <div class="row card-primary">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-right: 5%">
                                                            <h5>Bạn đọc<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="reader_id" required=""
                                                                        class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        Chọn bạn đọc
                                                                    </option>

                                                                    @foreach($readers as $reader)
                                                                        <option
                                                                            value="{{ $reader->id }}" {{ ($borrow->reader_id == $reader->id)? "selected":"" }} >{{ $reader->student_code }}
                                                                            - {{ $reader->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <a href="{{ route('reader.add') }}"
                                                                   style="float: left; margin-top: 1%"
                                                                   class="btn btn-rounded btn-outline-success mb-5">
                                                                    Thêm bạn đọc mới</a>
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-right: 15%">
                                                            <h5>Ghi chú</h5>
                                                            <div class="controls">
                                                                <input type="text" class="form-control" name="note"
                                                                       value="{{ $borrow->note }}">
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                        <div class="form-group" style="display: none">
                                                            <h5>Trạng thái</h5>
                                                            <div class="controls">
                                                                <input type="text" class="form-control" name="status"
                                                                       value="Đã trả">
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                        <div class="form-group" style="display: none">
                                                            <h5>Người xử lý</h5>
                                                            <div class="controls">
                                                                <input type="text" class="form-control" name="staff_id"
                                                                       value="{{ Auth::user()->id }}">
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                    </div>
                                                </div>


                                                <div class="row">

                                                    <div class="col-md-5">
                                                        @foreach($borrow_details as $borrow_detail)
                                                            @if($borrow_detail->borrow_id == $borrow->id)
                                                            <div class="form-group">
                                                                <h5>Tên sách <span class="text-danger">*</span></h5>
                                                                <div class="controls">

                                                                    <select name="book_id[]" required=""
                                                                            class="form-control">
                                                                        <option value="" selected="" disabled="">Chọn
                                                                            sách
                                                                        </option>


                                                                        @foreach($books as $book)

                                                                                <option
                                                                                    value="{{ $book->id }}" {{ ($borrow_detail->book_id == $book->id)? "selected":"" }} >{{ $book->name }}
                                                                                    [{{ $book->amount }}]
                                                                                </option>

                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div> <!-- // end form group -->
                                                            @endif
                                                        @endforeach

                                                    </div> <!-- End col-md-5 -->

                                                    <div class="col-md-5">
                                                        @foreach($borrow_details as $borrow_detail)
                                                            @if($borrow_detail->borrow_id == $borrow->id)
                                                                <div class="form-group">
                                                                    <h5>Đặt ngày trả <span class="text-danger">*</span></h5>
                                                                    <div class="controls">
                                                                        <input type="date" name="expire_date[]"
                                                                               value="{{$borrow_detail->expire_date}}"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        @endforeach
                                                    </div><!-- End col-md-5 -->

                                                    <div class="col-md-2" style="padding-top: 25px;">
                                                        <span class="btn btn-success addeventmore"><i
                                                                class="fa fa-plus-circle"></i> </span>
                                                    </div><!-- End col-md-5 -->

                                                </div> <!-- end Row -->

                                            </div>    <!-- // End add_item -->

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-outline-primary mb-5"
                                                       onclick="return confirm('Yêu cầu sau khi tạo sẽ không thể thay đổi hoặc xoá!\nBạn có chắc chắn tạo yêu cầu?')"
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


    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">

                    <div class="col-md-5">

                        <div class="form-group">
                            <h5>Tên sách <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="book_id[]" required="" class="form-control">
                                    <option value="" selected="" disabled="">Chọn sách</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }} [{{ $book->amount }}]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <!-- // end form group -->
                    </div> <!-- End col-md-5 -->

                    <div class="col-md-5">

                        <div class="form-group">
                            <h5>Đặt ngày trả <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" name="expire_date[]" class="form-control">
                            </div>
                        </div>
                    </div><!-- End col-md-5 -->

                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div><!-- End col-md-2 -->
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
            var counter = 0;
            $(document).on("click", ".addeventmore", function () {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function (event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });

        });
    </script>


@endsection
