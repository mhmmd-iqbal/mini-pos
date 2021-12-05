@extends('partials.master')

@section('title', 'TAMBAH PELANGGAN')

@section('custom_styles')

@endsection

@section('custom_scripts')

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
                                    Pelanggan
                                </h4>
                            </div>
                            <div class="card-body">
                               <div class="row form-group">
                                   <div class="col-4">
                                       <label for="">Nama</label>
                                       <input type="text" class="form-control" id="name">
                                   </div>
                               </div>
                               <div class="row form-group">
                                   <div class="col-4">
                                       <label for="">Nomer Telepon</label>
                                       <input type="text" class="form-control" id="phone">
                                   </div>
                                   <div class="col-4">
                                       <label for="">Email</label>
                                       <input type="email" class="form-control" id="email">
                                   </div>
                               </div>
                               <div class="row form-group">
                                   <div class="col-8">
                                       <label for="">Alamat</label>
                                        <textarea name="" id="address" cols="30" rows="10" class="form-control"></textarea>
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

        let err = false;

         if(name === '') {
            err = true;
            toastr.error('<div>Nama Pelanggan Tidak Boleh Kosong!</div>')
        } 

        if(phone === '') {
            err = true;
            toastr.error('<div>Nomer Telpon Pelanggan Tidak Boleh Kosong!</div>')
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
            let url  = "{{route('customer.store')}} "
            ajaxRequest( 'POST', url, { name: name, phone: phone, email: email, address: address } ).then((result) => {
                if(result.status) {
                    toastr.success('Berhasil Menambahkan Data')
                    setTimeout(() => { 
                        window.location.href = "{{route('customer.index')}}"
                    }, 1000);
                } else {
                    toastr.error('Gagal Menambahkan Data')
                }
            }).catch((err) => {
                toastr.error(`Error ${err.responseJSON.message}`)
            });
        }

    }
</script>
@endsection