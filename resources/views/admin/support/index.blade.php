@extends('layouts/layoutMaster')

@section('title', 'Support - Tickets')


@section('vendor-script')

  <!-- jqGrid Libs - Start -->
  <script type="text/ecmascript" src="{{asset('assets/jqGrid/js/jquery.jqGrid.min.js')}}"></script>
  <script type="text/ecmascript" src="{{asset('assets/jqGrid/js/grid.locale-en.js')}}"></script>
  <script type="text/ecmascript" src="{{asset('assets/jqGrid/js/context-menu.js')}}"></script>

  <!-- Load excel lib files -->
  <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

  <!-- Load pdfmake lib files -->
  <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.26/build/pdfmake.min.js">	</script>
  <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.26/build/vfs_fonts.js"></script>

  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/jqGrid/css/jquery-ui.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/jqGrid/css/ui.jqgrid.css')}}">
  <!-- jqGrid Libs - Start -->
@endsection


@section('page-script')
  <script src="{{asset('js/jqGrid.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function () {

      let GridColumns = [
        {
          label: 'ID',
          name: 'id',
          width: 50,
          key: true,
          align:'center',
          sorttype: 'number',
        },
        {
          label: 'Order #',
          name: 'order_number',
          width: 80,
          align:'center',
          editable: true,
          editrules:{ required: true},
        },
        {
          label:'Customer',
          name: 'customer_id',
          width: 80 ,
          align:'center',
        },
        {
          label: 'Title',
          name: 'title',
          width: 150,
          editable: true,
          align:'center',
          editrules:{ required: true},
        },
        {
          label: 'Description',
          name: 'description',
          width: 80,
          align:'center',
          editable: true,
          editrules:{ required: true},
        },
        {
          label:'Added On',
          name: 'added_on',
          width: 100,
          align:'center',
          formatter: 'date', formatoptions: { newformat: 'd M, Y'}
        },
        {
          label:'Status',
          name: 'status',
          width: 80 ,
          align:'center',
          editable: true,
          edittype: "select",
          editrules:{required: true},
          editoptions : {value:"0:Pending;1:Completed"}
        },
        {
          label: "Details",
          name: "id",
          width: 80,
          align: 'center',
          search:false,
          formatter: formatActions,
        }
      ];
// btoa
      function formatActions(cellValue, options, rowObject){
        let actionLink = "<a title='View Ticket Details' href='single/ticket/" + (cellValue) + "'><i style='color: #ff178c;' class='fa-sharp fa-solid fa-circle-info'></i></a>";
        return actionLink;
      }

      // Search Records
      var timer;
      $("#txtSearch").on("keyup", function() {
        let self = this;
        if(timer) { clearTimeout(timer); }
        timer = setTimeout(function(){
          //timer = null;
          $("#jqGrid").jqGrid('filterInput', self.value, {searchAll: true});
        },0);
      });


      //Show JQGrid
      showJQGrid("{{@csrf_token()}}", GridColumns, "get-tickets", "Tickets", 'ticket-operations', true, false, false, false, false, false, 25, 950);

    });

  </script>
@endsection

@section('content')
  <div class="row">
    <div class="col-xl-4 col-md-4 col-6 mb-2">
      <div class="flex-grow-1 input-group input-group-merge rounded-pill">
        <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
        <input type="text" id="txtSearch" class="form-control chat-search-input" placeholder="Search...">
      </div>
    </div>
    <div class="col-xl-4 col-md-4 col-6 mb-2 text-center"></div>
    <div class="col-xl-4 col-md-4 col-6 mb-2"></div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table id="jqGrid"></table>
      <div id="jqGridPager"></div>
    </div>
  </div>
@endsection
