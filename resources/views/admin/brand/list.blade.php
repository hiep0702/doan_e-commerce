@extends('admin.layout.master')

@section('title')
Danh sách thương hiệu
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Thương hiệu
                        <small>Danh sách</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.brand.search')}}" method="post">
                        @csrf
                        <input  name="search" class="input-search" placeholder="Tìm kiếm theo mã hoặc tên ">
                        <button type="submit" class="btn-add-product btn btn-success">Tìm kiếm</button>
                    </form>
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Thêm sản phẩm</a>
                </div>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- /.col-lg-12 -->
            @if (!empty($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            @if (!empty($brands))
            <table  class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Logo</th>
                        <th>Thông tin</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody id="table-body-side"></tbody>
                <tbody id="table-body-main">
                    @foreach ($brands as $index => $brand)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index + 1}}</td>
                        <td>{{$brand->Code}}</td>
                        <td>{{$brand->Name}}</td>
                        <td><img width="100" src="{{$brand->Logo}}" alt=""></td>
                        <td>{{$brand->Information}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.brand.delete', $brand->ID)}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.brand.edit', $brand->ID)}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $brands->links() !!}
            @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</div>

<script>
    //  $(document).ready(function(){
    //     $('#brand_search').(function(){
    //         var query = $(this).val();
    //         if(query != ''){
    //             var _token = $('input[name="_token"]').val();
    //             $.ajax({
    //                 url: "{{ route('admin.brand.search') }}",
    //                 method: "POST",
    //                 data:{query:query, _token:_token},
    //                 success:function(data){
    //                     $('#table-body-main').hide();
    //                     $('#table-body-side').html(data);
    //                     console.log(data);
    //                 }
    //             })
    //         }else{
    //             $('#table-body-main').show();
    //         }
    //     })
    // })

    // $(document).ready(function(){
    //     $('#brand').(function(){
    //         var brand = $(this).val();
    //         if(brand != ''){
    //             var _token = $('input[name="_token"]').val();
    //             $.ajax({
    //                 url:"{{ route('admin.product.search') }}",
    //                 method:"POST",
    //                 data:{brand:brand, _token:_token},
    //                 success:function(data){
    //                 $('#categories').html(data);
    //                 }
    //             })
    //         }
    //     })
    // })
</script>
@endsection