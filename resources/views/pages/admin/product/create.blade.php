@extends('layouts.admin')

@section('title')
    Create New Product
@endsection

@section('content')
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Product</h2>
                <p class="dashboard-subtitle">Tax Center Marketplace</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                          </div>
                      @endif
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nama Product</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Penjual</label>
                                        <select name="users_id" class="form-control">
                                          @foreach ($users as $user)
                                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="categories_id" class="form-control">
                                          @foreach ($categories as $category)
                                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                  <label for="">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    {{-- id="numberformat"  --}}
                                    <input type="number" name="price" class="form-control" id="numberformat">
                                </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="editor"></textarea>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5">Save Now</button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
@endsection
@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
  $('#numberformat').keyup(function(event) {

// skip for arrow keys
if(event.which >= 37 && event.which <= 40) return;

// format number
$(this).val(function(index, value) {
  return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  });
});
</script> --}}

@endpush