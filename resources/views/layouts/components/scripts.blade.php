
  <!-- plugins:js -->
  <script src="/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="/vendors/chart.js/Chart.min.js"></script>
  <script src="/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/js/off-canvas.js"></script>
  <script src="/js/hoverable-collapse.js"></script>
  <script src="/js/template.js"></script>
  <script src="/js/settings.js"></script>
  <script src="/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/js/dashboard.js"></script>
  <script src="/js/Chart.roundedBarCharts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
  
  
  <!-- End custom js for this page-->

  <script>
    $(document).ready( function () {
      $.each($('.dtt'), function (indexInArray, el) {
        const label=el.closest('.card-body').children[0].innerText
         $(el).DataTable({
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'copy',
            className: 'btn btn-default btn-sm',
            title:label
          },
          {
            extend: 'csv',
            className: 'btn btn-success btn-sm',
            title:label
          },
          {
            extend: 'excel',
            className: 'btn btn-success btn-sm',
            title:label
          },
          {
            extend: 'pdf',
            className: 'btn btn-warning btn-sm',
            title:label
          },
          {
            extend: 'print',
            className: 'btn btn-info btn-sm',
            title:label
          },
            // 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
      });
    // $(DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //       {
    //         extend: 'copy',
    //         className: 'btn btn-default btn-sm',
    //         title:'printing'
    //       },
    //       {
    //         extend: 'csv',
    //         className: 'btn btn-success btn-sm',
    //         title:'printing'
    //       },
    //       {
    //         extend: 'excel',
    //         className: 'btn btn-success btn-sm',
    //         title:'printing'
    //       },
    //       {
    //         extend: 'pdf',
    //         className: 'btn btn-warning btn-sm',
    //         title:'printing'
    //       },
    //       {
    //         extend: 'print',
    //         className: 'btn btn-info btn-sm',
    //         title:'printing'
    //       },
    //         // 'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });'.dtt').
  } );

    setInterval(() => {
      $.ajax({
        url: "/stat",
        success: (res) =>{
            $('#stat-water')[0].style.color=res.water==='connected'?'green':'red'
            $('#stat-water')[0].title='Water device is '+res.water
            $('#stat-feeder')[0].style.color=res.feeder==='connected'?'green':'red'
            $('#stat-feeder')[0].title='Feeder device is '+res.feeder
            $('#stat-light')[0].style.color=res.light==='connected'?'green':'red'
            $('#stat-light')[0].title='Light device is '+res.light
            $('#stat-temperature')[0].style.color=res.temperature==='connected'?'green':'red'
            $('#stat-temperature')[0].title='Temperature device is '+res.temperature
        }
      });
    }, 1000);
  </script>

  @stack('scripts')