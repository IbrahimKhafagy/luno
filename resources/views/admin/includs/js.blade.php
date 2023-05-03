<script src="{{url('/')}}/admin/assets/js/theme.js"></script>

  <script src="{{url('/')}}/admin/assets/js/bundle/apexcharts.bundle.js"></script>

  <script src="{{url('/')}}/admin/assets/js/bundle/apexcharts.bundle.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


  {{-- <script>
    $(document).ready(function(){

        $('#table_id').dataTable({
            processing:true,
        });
    });
  </script> --}}


@stack('javascripts')


  @yield('js')
  <script>
    // LUNO Revenue
    var options = {
      series: [{
        name: 'Income',
        data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
      }, {
        name: 'Expenses',
        data: [123, 142, 135, 127, 143, 122, 117, 131, 122, 122, 112, 116]
    }, {
        name: 'Revenue',
        data: [223, 242, 235, 227, 243, 222, 217, 231, 222, 222, 212, 216]
      }],
      chart: {
        type: 'bar',
        height: 260,
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false,
        },
      },
      colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
      responsive: [{
        breakpoint: 480,
        options: {
            legend: {
            position: 'bottom',
            offsetX: -10,
            offsetY: 0
        }
        }
    }],
      xaxis: {
        categories: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      },
      fill: {
        opacity: 1
    },
    dataLabels: {
        enabled: false,
    },
      legend: {
          position: 'bottom',
          horizontalAlign: 'center',
        },
    };
    var chart = new ApexCharts(document.querySelector("#apex-AudienceOverview"), options);
    chart.render();
    // Sales by Category
    var options = {
      chart: {
        height: 280,
        type: 'donut',
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
                show: true,
              total: {
                showAlways: true,
                show: true
            }
        }
          }
        }
      },
      dataLabels: {
        enabled: false,
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        show: true,
    },
      colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
      series: [55, 35, 10],
    }
    var chart = new ApexCharts(document.querySelector("#apex-SalesbyCategory"), options);
    chart.render();
  </script>


    <script>
        @if(Session::has('message'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
            toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
            toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
            toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>








