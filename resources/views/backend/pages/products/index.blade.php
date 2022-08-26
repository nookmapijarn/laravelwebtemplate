@extends('backend.layouts.main_template')
@section('title') รายการสินค้า @parent @endsection
@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>รายการสินค้า</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('backend') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div>
      </div>
      <div></div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="clearfix">
                <a class="float-right" href="{{ route('products.create') }}">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-plus" ></i> เพิ่มรายการสินค้า
                    </button>
                </a>
              </div>
                @if($message = Session::get('success'))
                <div class="alert alert-primary text-center mb-3">
                    {{ $message }}
                </div>
                @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img src="{{ $product->image }}" width="50"></td>
                        <td>{{ $product->created_at ? \Carbon\Carbon::parse($product->created_at) -> format('d/m/y') : 'ว่าง' }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->updated_at) -> format('d/m/y') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('products.show', $product->id) }}">
                                  <button type="button" class="btn btn-info">View</button>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}">
                                  <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                <form method="POST" action="{{ 
                                  route('products.destroy', $product->id) }}">
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('ยืนยัน ลบ สินค้า');">Delete</button>
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
              </table>

              {{-- <div class="mt-3">
                {{ $products->links('pagination::bootstrap-4'); }}
              </div> --}}

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection

@push('scripts')

<!-- DataTables  & Plugins -->
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {

    $('#example2').DataTable({
      "paging": true,
      "pageLength":25,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": [
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 5, 6 ]
            }
        },
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 5, 6 ]
            }
        },
        // {
        //     extend: 'excelHtml5',
        //     exportOptions: {
        //         columns: [ 0, 1, 2, 3, 5, 6 ]
        //     }
        // },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 5, 6 ]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 5, 6 ]
            }
        },
        ,"colvis",
      ],
      "columnDefs": [
      {
        "targets": [4,7],
        "orderable": false
      }],
      "language": {
        "info": "แสดง START ถึง END จาก TOTAL แถว",
        "infoEmpty": "แสดงทั้งหมด 0 to 0 of 0 รายการ",
        "zeroRecords": "ไม่พบข้อมูล",
        "search": "ค้นหา:",
        "paginate": {
          "first":      "หน้าแรก",
          "last":       "หน้าสุดท้าย",
          "next":       "ถัดไป",
          "previous":   "ก่อนหน้า"
        },
        "buttons": {
            "collection": "ชุดข้อมูล",
            "colvis": "การมองเห็นคอลัมน์",
            "colvisRestore": "เรียกคืนการมองเห็น",
            "copy": "คัดลอก",
            "copyKeys": "กดปุ่ม Ctrl หรือ Command + C เพื่อคัดลอกข้อมูลบนตารางไปยัง Clipboard ที่เครื่องของคุณ",
            "copySuccess": {
                "_": "คัดลอกช้อมูลแล้ว จำนวน %d แถว",
                "1": "คัดลอกข้อมูลแล้ว จำนวน 1 แถว"
            },
            "copyTitle": "คัดลอกไปยังคลิปบอร์ด",
            "csv": "CSV",
            "excel": "Excel",
            "pageLength": {
                "_": "แสดงข้อมูล %d แถว",
                "-1": "แสดงข้อมูลทั้งหมด"
            },
            "pdf": "PDF",
            "print": "สั่งพิมพ์"
        },
      }
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

  });
</script>

@endpush