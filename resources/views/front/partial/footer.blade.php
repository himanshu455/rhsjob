<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>

{!! Html::script("bower_components/jquery/dist/jquery.min.js") !!}
{!! Html::script("bower_components/bootstrap/dist/js/bootstrap.min.js") !!}
<!-- DataTables -->
{!! Html::script("bower_components/jquery/dist/jquery.min.js") !!}
{!! Html::script("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") !!}
{!! Html::script("dist/js/adminlte.min.js") !!}
{!! Html::script("bower_components/bootstrap-daterangepicker/daterangepicker.js") !!}
{!! Html::script("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") !!}
{!! Html::script("plugins/iCheck/icheck.min.js") !!}
{!! Html::script("bower_components/datatables.net/js/jquery.dataTables.min.js") !!}
{!! Html::script("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") !!}







<script>
  $(function () {
       $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

   $("div.alert").delay(2500).fadeOut(300);

   
</script>

</body>
</html>