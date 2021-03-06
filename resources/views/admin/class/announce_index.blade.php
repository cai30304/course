@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$class->tutorial->tutorial_name_cn}} - 課程公告</h3>
                    </div>
                    <div class="card-body">
                        <a href="javascript:history.back()">
                            <button type="submit" class="btn btn-success">返回</button>
                        </a>
                        <a class="btn btn-success" href="/micro-course/class/announce/{{$class->id}}/create">新增公告</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>標題</th>
                                <th>內容</th>
                                <th>附件</th>
                                <th>上架時間</th>
                                <th>下架時間</th>
                                <th>狀態</th>                                
                                <th>功能</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>
                                        {{$item->title}}
                                    </td>
                                    <td>
                                        {{$item->content}}
                                    </td>
                                    <td>
                                        @if($item->files)
                                        <a href="{{$item->title}}" download>附件下載</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        {{$item->getDate($item->start_date)}}
                                    </td>
                                    <td>
                                        @if($item->end_date)
                                        {{$item->getDate($item->end_date)}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->pushed == 0)
                                            未上架
                                        @elseif($item->pushed == 1 && $item->soft_delete == 0)
                                            已上架
                                        @elseif($item->soft_delete == 1)
                                            已撤下
                                        @endif
                                    </td>
                                    <td width="150">
                                        {{-- <a class="btn btn-sm btn-success mt-1" href="/micro-course/class/announce/1/edit">編輯</a> --}}
                                        <button class="btn btn-sm btn-danger mt-1" data-listid="{{$item->id}}">撤下</button>
                                        <form class="delete-form" action="/micro-course/class/announce/1/delete" method="POST" style="display: none;" data-listid="{{$item->id}}">
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [[2,'asc']],
                language:{
                    "processing":   "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu":   "顯示 _MENU_ 項結果",
                    "zeroRecords":  "沒有符合的結果",
                    "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix":  "",
                    "search":       "搜尋:",
                    "paginate": {
                        "first": "<<",
                        "last": ">>",
                        "next": ">",
                        "previous": "<"
                    },
                    "aria": {
                        "sortAscending":  ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                }
            });
        } );

        $('.btn-danger').click(function(){
            var listid = $(this).data("listid");
            if (confirm('確認是否撤下此公告？')){
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });

    </script>
@endsection