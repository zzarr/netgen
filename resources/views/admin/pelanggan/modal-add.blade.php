<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form action="{{ route('pelanggan.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput2">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Nama"
                            name="nama">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput2">No HP</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="No HP"
                            name="no_hp">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput2">alamat</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Alamat"
                            name="alamat">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput2">Paket</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="paket"
                            name="paket">
                    </div>
                </div>

                <input type="hidden" name="id_petugas" value="{{ Auth::user() ? Auth::user()->id : '1' }}">

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                        Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>
