@extends('layouts.new_app')

@section('content')
      <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Data</a>
          </li><li class="breadcrumb-item active">Songs</li>
          
        </ol>
        <!-- Icon Cards-->
        <div class="card mb-3">
                  <div class="card-header">
                      <i class="fas fa-table"></i> Songs
                         <button class="btn btn-info float-right btn-add" href="#" style="margin-right: 5px" data-toggle="modal" data-target="#manageModal">Add Song</button>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-hover" id="tblsongs" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Date Created</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>
            
                  </div>
                   
        </div>

@endsection
@section('modal_custom')
   <!-- add Modal-->
    <div class="modal fade" id="manageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Manage Data</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <form class="form-songs">
                 {{csrf_field()}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Input Title" required="">
                    </div>
                     <div class="form-group">
                        <label>Artist</label>
                        <input type="text" name="artist" class="form-control" placeholder="Input Artist" required="">
                    </div>

                     <div class="form-group">
                        <label>Lyrics</label>
                        <textarea class="form-control" rows="10" name="lyrics" placeholder="lyrics" required=""></textarea>
                    </div>
                    <input type="text" name="id" id="id" hidden>
          </div>
          <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "OK" below if you are ready to delete your current song.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-danger" onclick="deleteSong()">OK</button>
           
          </div>
        </div>
      </div>
    </div>

@endsection
@section('js_custom')
<script type="text/javascript">

$(document).ready(function() {
    songs_data();
    $('#tblsongs tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            sTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            // var  sTable = $('#tblsongs').DataTable();
            $("input[name=title]").val(sTable.rows('.selected').data()[0].title);
            $("input[name=artist]").val(sTable.rows('.selected').data()[0].artist);
            $("textarea[name=lyrics]").val(sTable.rows('.selected').data()[0].lyrics);

        }
        
    });
});
  
$(".form-songs").submit(function (e) {
    e.preventDefault();
    manageSongs();
})


var action = 'add';
$(".btn-add").submit(function (e) {
    e.preventDefault();
    action = 'add';
})

function manageSongs(){
    if (action == 'add'){
        url_ = "{{ route('songs.addSongs') }}";
    }else {
        url_ = "{{ route('songs.updateSongs') }}"
    }
    $.ajax({
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        url: url_,
        type: 'POST', 
        dataType:'text',
        cache: false,
        contentType: false,
        processData: false,
        data:new FormData($(".form-songs")[0]),       
        success: function(data){
            var obj = JSON.parse(data);
            $("#manageModal").modal('hide');
            $('#tblsongs').DataTable().ajax.reload();
            action = 'add';

        },
        error: function(data){
          
        }
    
    });
} 

var sTable
//songs table 
function songs_data() {
         sTable =   $('#tblsongs').DataTable( {
            "aProcessing": true,
            "aServerSide": true,
            "orderCellsTop": true,
            "bDeferRender": true, 
            "bDestroy": true,
            "ajax": {
                "url": "{{route('songs.rawdata')}}",
                "dataSrc": ""
            },
            "columns": [
                
                  {   
                     "data":"title",
                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                      {
                          $(nTd).css('text-align', 'left');
                          $(nTd).css('width', '30%');
                          $(nTd).css('cursor', 'pointer');
                          $(nTd).css('padding', '3px');
                          $(nTd).css('padding-left', '8px');
                          $(nTd).css('padding-right', '5px');
                          $(nTd).css('font-weight', 'bold');
                          $(nTd).css('letter-spacing', '0.9px');
                          $(nTd).css('padding-bottom', '3px');
                          $(nTd).css('padding-top', '5px');
                      },
                      "mRender": function( data, type, full ,meta) {
                          if ((full.title).length>=47) {
                            return '<td>'+ (full.title).substr(0,47)+"...</td>";
                          } else {
                            return '<td>'+ full.title  +'</td>';
                          }
                      }
                  },
                    {   
                    "data":"artist",
                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                      {
                          $(nTd).css('text-align', 'left');
                          $(nTd).css('width', '20%');
                          $(nTd).css('font-size', '14px');
                          $(nTd).css('padding', '7px');
                          $(nTd).css('padding-bottom', '3px');
                          $(nTd).css('cursor', 'pointer');
                      },
                      "mRender": function( data, type, full ,meta) {
                          return '<td>'+ full.artist  +'</td>';
                      }
                  },
                    {   
                    "data":"created_at",
                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                      {
                          $(nTd).css('text-align', 'left');
                          $(nTd).css('width', '20%');
                          $(nTd).css('font-size', '14px');
                          $(nTd).css('padding', '7px');
                          $(nTd).css('padding-bottom', '3px');
                          $(nTd).css('cursor', 'pointer');
                      },
                      "mRender": function( data, type, full ,meta) {
                          return '<td>'+ formatDate(full.created_at)  +'</td>';
                      }
                  },
                   {   
                    "data":"id",
                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                      {
                          $(nTd).css('text-align', 'center');
                          $(nTd).css('width', '7%');
                          $(nTd).attr('data-container', 'body');
                          $(nTd).attr('data-toggle', 'tooltip');
                          $(nTd).attr('data-placement', 'top');
                          $(nTd).attr('title', 'Click to Toggle');
                          $(nTd).css('padding-bottom', '3px');
                      },
                      "mRender": function( data, type, full ,meta) {
                           return '<td><div id="btn_"'+full.id+'><button class="btn btn-sm btn-primary" title="Edit Data" onclick="edit_data('+full.id+')"><i class="fa fa-save"></i></button> | <button class="btn btn-sm btn-danger" title="Delete Data" onclick="delete_Data('+full.id+')" ><i class="fa fa-times"></i></button></div></td>';
                      }
                      
                  },
                 

           ],"columnDefs": [
                    {
                            // "targets": [ 10,11 ],
                            // "visible": false,
                            // "searchable": false
                    },
            ]
         }
    );
    }

    function formatDate(date) {
      date_ =  new Date(date);

       var monthNames = [
          "January", "February", "March",
          "April", "May", "June", "July",
          "August", "September", "October",
          "November", "December"
        ];

        var day = date_.getDate();
        var monthIndex = date_.getMonth();
        var year = date_.getFullYear();

        return day + ' ' + monthNames[monthIndex] + ',' + year;
    }

    var id;
    function delete_Data(data){
        id = data;
        $("#deleteModal").modal('show');
    } 

    function deleteSong(){
        var $this = $(this);
        var fd = new FormData; 
        fd.append('_token', $('input[name=_token]').val());
        fd.append('id', id);
        $.ajax({
            url: "{{ route('songs.deleteSong') }}",
            type: 'POST', 
            dataType:'text',
            cache: false,
            contentType: false,
            processData: false,
            data:fd,       
            success: function(data){
                $("#deleteModal").modal('hide');
                $('#tblsongs').DataTable().ajax.reload();
            },
            error: function(data){
              
            }
        
        });
    }  

    function edit_data(data){
       
        action="edit"
        $("#id").val(data);
        $("#manageModal").modal('show');
    }

</script>
@endsection
