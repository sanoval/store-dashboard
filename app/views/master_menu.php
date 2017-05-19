    <section class="content-header">
      <h1>
        Master
        <small>Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
        <li class="active">Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="contents">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Menu</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover table-striped table-bordered" id="datalist">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Parent</th>
                        <th>Class</th>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
      $(document).ready(function() {
        table = $('#datalist').DataTable({
          "autoWidth": false,
          "searching": true,
          "bLengthChange": false,
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [], //Initial no order.

          // Load data for the table's content from an Ajax source
          "ajax": {
            "url": "/public/master_menu/ajax_list",
            "type": "POST"
          },

          //Set column definition initialisation properties.
          "columnDefs": [
          {
              "targets": [ -1 ], //last column
              "orderable": false //set not orderable
            }]

        })
      })

      function reload_table() {
        table.ajax.reload(null,false); //reload datatable ajax
      }


      function deleteThis(id) {
        if (confirm("Anda yakin?")==true) {
          $.ajax({
            url: "/public/master_menu/delete/"+id,
            dataType: 'JSON',
            type: 'POST',
            contentType: false,
            cache: false,
            success: function(msg) {
              if (msg.status="ok") {
                reload_table();
              }
            }
          })
        }
      }
    </script>