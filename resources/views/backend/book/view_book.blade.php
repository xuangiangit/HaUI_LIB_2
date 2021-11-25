@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row" style="margin-left: 3%">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Các đầu sách tại thư viện</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <a href="{{ route('book.add') }}" style="float: right; margin-right: 3%"
                                       class="btn btn-rounded btn-success mb-5"> Thêm mới</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">STT</th>
                                            <th>Tên sách</th>
                                            <th>Tác giả</th>
                                            <th>Số lượng</th>
                                            <th>Ảnh</th>
                                            <th>Danh mục</th>
                                            <th width="25%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $book )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $book->name }}</td>
                                                <td> {{ $book->author }}</td>
                                                <td> {{ $book->amount }}</td>
                                                <td> <img src="{{ (!empty($book->image))? url('upload/book_images/'.$book->image):url('upload/no_image.jpg') }}" width="100" height="150"> </td>
                                                @foreach($categories as $key => $category )
                                                    @if($book->category_id == $category->id)
                                                        <td>{{ $category->name }}</td>
                                                    @endif
                                                @endforeach


                                                <td>
                                                    <a href="{{ route('book.edit',$book->id) }}"
                                                       class="btn btn-outline-info">Edit</a>
                                                    <a href="{{ route('book.delete',$book->id) }}" onclick="return confirm('Bạn có chắc chắn xoá?')"
                                                       class="btn btn-outline-danger" id="delete">Delete</a>
                                                    <a href=""
                                                       class="btn btn-outline-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection