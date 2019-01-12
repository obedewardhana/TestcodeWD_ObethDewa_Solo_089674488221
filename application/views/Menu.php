    <div class="container"> 
        <h3>DAFTAR MENU</h3>
        <br />
        <button class="btn btn-success" onclick="add_menu()"><i class="glyphicon glyphicon-plus"></i> Tambah Menu</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th style="width:150px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
 
<script src="<?php echo base_url('assets/js/jquery-3.3.1.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
 
 
<script type="text/javascript">
 
var save_method; 
var table;
var base_url = '<?php echo base_url();?>';
 
$(document).ready(function() {
 

    table = $('#table').DataTable({ 
 
        "processing": true, 
        "serverSide": true, 
        "order": [], 
 

        "ajax": {
            "url": "<?php echo site_url('person/ajax_list')?>",
            "type": "POST"
        },
 

        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
 
    });
  
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
 
 
 
function add_menu()
{
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Tambah Menu'); 
 
    $('#photo-preview').hide(); 
 
    $('#label-photo').text('Upload Gambar'); 
}
 
function edit_person(menu_id)
{
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
 
 
    $.ajax({
        url : "<?php echo site_url('Menu/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="menu_id"]').val(data.id);
            $('[name="menu_name"]').val(data.menu_name);
            $('[name="menu_price"]').val(data.menu_price);
            $('[name="menu_status"]').val(data.menu_status);
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit Menu'); 
 
            $('#photo-preview').show(); 
 
            if(data.photo)
            {
                $('#label-photo').text('Ubah Gambar');
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); 
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Hapus Gambar dan Menyimpan'); 
 
            }
            else
            {
                $('#label-photo').text('Upload Photo');
                $('#photo-preview div').text('(Tidak ada gambar)');
            }
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error Mengambil Data');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); 
}
 
function save()
{
    $('#btnSave').text('Menyimpan.'); 
    $('#btnSave').attr('disabled',true); 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('Menu/ajax_add')?>";
    } else {
        url = "<?php echo site_url('Menu/ajax_update')?>";
    }
 
    // Ajax menambahkan data ke database
 
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) 
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
            }
            $('#btnSave').text('Simpan'); 
            $('#btnSave').attr('disabled',false); 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Gagal Mengganti/ Menambah Data');
            $('#btnSave').text('Simpan'); 
            $('#btnSave').attr('disabled',false); 
 
        }
    });
}
 
function delete_person(id)
{
    if(confirm('Anda yakin menghapus data ini?'))
    {

        $.ajax({
            url : "<?php echo site_url('Menu/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Gagal Menghapus Data');
            }
        });
 
    }
}
 
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Menu</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="menu_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Menu</label>
                            <div class="col-md-9">
                                <input name="menu_name" placeholder="Nama Menu" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="menu_price" placeholder="Harga" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select name="menu_status">
                                    <option value="ready">Ready</option>
                                    <option value="not_ready">Not Ready</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
