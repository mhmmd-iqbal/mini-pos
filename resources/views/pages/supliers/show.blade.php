@extends('partials.master')

@section('title', 'DATA SUPLIER')

@section('custom_styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('custom_scripts')

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>



@endsection

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-uppercase">
                                    Suplier {{$suplier->name}}
                                </h4>
                            </div>
                            <div class="card-body">
                               <div class="row form-group">
                                   <div class="col-4">
                                       <label for="">Nama</label>
                                       <input type="text" value="{{$suplier->name}}" class="form-control" id="name">
                                   </div>
                                   <div class="col-4">
                                        <label for="" class="form-control-label">Status Promo</label>
                                        <div>
                                            <input type="checkbox" {{$suplier->status === 'active' ? 'checked' : ''}} name="status" id="status" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="danger" >
                                        </div>
                                    </div>
                               </div>
                               <div class="row form-group">
                                   <div class="col-4">
                                       <label for="">Nomer Telepon</label>
                                       <input type="text" value="{{$suplier->phone}}" class="form-control" id="phone">
                                   </div>
                                   <div class="col-4">
                                       <label for="">Email</label>
                                       <input type="email"  value="{{$suplier->email}}" class="form-control" id="email">
                                   </div>
                               </div>
                               <div class="row form-group">
                                   <div class="col-8">
                                       <label for="">Alamat</label>
                                        <textarea name="" id="address" cols="30" rows="10" class="form-control">{{$suplier->address}}</textarea>
                                   </div>
                               </div>
                               <div class="row form-group">
                                    <div class="col-8 text-right">
                                        <button class="btn btn-success" onclick="submitData(this)">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection


@section('javascript')
<script>
    const submitData = (e) => {
        let name = $('#name').val()
        let phone = $('#phone').val()
        let email = $('#email').val()
        let address = $('#name').val()
        let status = $('#status').prop('checked') ? 'active' : 'freeze'
        // let status = $('input[name="status"]').bootstrapToggle(res.status === 'active' ? 'on' : 'off');
        let err = false;

         if(name === '') {
            err = true;
            toastr.error('<div>Nama Suplier Tidak Boleh Kosong!</div>')
        } 

        if(phone === '') {
            err = true;
            toastr.error('<div>Nomer Telpon Suplier Tidak Boleh Kosong!</div>')
        }


        if(email === ''){
            err = true;
            toastr.error('<div>Email Tidak Boleh Kosong!</div>')
        }

        if(address === ''){
            err = true;
            toastr.error('<div>Alamat Tidak Boleh Kosong!</div>')
        }

        if(!err) {
            let url  = "{{route('suplier.update', 'IDSuplier')}}".replace('IDSuplier', '{{$suplier->id}}')
            ajaxRequest( 'PUT', url, { name: name, phone: phone, email: email, address: address, status: status } ).then((result) => {
                if(result.status) {
                    toastr.success('Berhasil Mengubah Data')
                    setTimeout(() => { 
                        window.location.href = "{{route('suplier.index')}}"
                    }, 1000);
                } else {
                    toastr.error('Gagal Mengubah Data')
                }
            }).catch((err) => {
                toastr.error(`Error ${err.responseJSON.message}`)
            });
        }

    }
</script>
@endsection