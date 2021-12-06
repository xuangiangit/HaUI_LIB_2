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
                                <h3 class="box-title">Quản lý sự cố </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
{{--                                    <a href="{{ route('issues.add') }}" style="float: right; margin-right: 3%"--}}
{{--                                       class="btn btn-rounded btn-success "> Nhập sự cố</a>--}}
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%">ID</th>
                                            <th>Người đọc</th>
                                            <th>Sách</th>
                                            <th>Nội dung sự cố</th>
                                            <th>Người xử lý</th>
                                            <th style="width: 25%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($allData as $key => $issues )
                                            <tr>

                                                @foreach($readers as $key => $reader )
                                                    @if($reader->id == $issues->reader_id)
                                                        <td>{{ $reader->student_code }} - {{ $reader->name }}</td>
                                                    @endif
                                                @endforeach

                                                <td style="width: 10%"><a href="#">{{ $issues->id }}</a></td>

                                                @foreach($readers as $key => $reader )
                                                    @if($reader->id == $issues->reader_id)
                                                        <td>{{ $reader->name }}</td>
                                                    @endif
                                                @endforeach

                                                {{--                                                @php--}}
                                                {{--                                                    $amount_book = DB::table('borrow_details')->where('borrow_id', $borrow['id'])->count('*');--}}
                                                {{--                                                @endphp--}}

                                                @php
                                                    $amount_book = 0;
                                                @endphp

{{--                                                @foreach($borrow_details as $key => $borrow_detail )--}}
{{--                                                    @foreach($books as $key => $book )--}}

{{--                                                        @if($book->id == $borrow_detail->book_id && $borrow_detail->borrow_id == $borrow->id)--}}
{{--                                                            <div style="display:none;">  {{ $amount_book++  }}</div>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                @endforeach--}}
                                                <td>
                                                    {{ $amount_book  }}
                                                </td>

                                                <td style="font-weight: bold; text-align: center; font-size: 14px">
{{--                                                    @if( $borrow->status == "Đang mượn")--}}
{{--                                                        <div style="background-color: #ccc; color: #0045d7;">--}}
{{--                                                            {{ $borrow->status }}--}}
{{--                                                        </div>--}}
{{--                                                    @elseif($borrow->status == "Đã trả")--}}
{{--                                                        <div style="background-color: #ccc; color: green;">--}}
{{--                                                            {{ $borrow->status }}--}}
{{--                                                        </div>--}}
{{--                                                    @else--}}
{{--                                                        <div style="background-color: #ccc; color: red;">--}}
{{--                                                            {{ $borrow->status }}--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}

                                                </td>
                                                <td>
{{--                                                    <a href="{{ route('borrow.detail',$borrow->id) }}"--}}
{{--                                                       class="btn btn-info">Xuất phiếu</a>--}}
                                                    <a href=""
                                                       class="btn btn-warning">Chi tiết</a>

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