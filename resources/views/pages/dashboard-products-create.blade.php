@extends('layouts.dashboard')

@section('title')
    Tambah Produk
@endsection

@section('content')
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Buat Produk</h2>
                <p class="dashboard-subtitle">Buat Produk Yang Berkesan</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                        </div>
                    @endif
                    <form action="{{ route('dashboard-product-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" name="name" autofocus required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form-control" name="stock" required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Harga Jual</label>
                                <input type="number" class="form-control" name="price" required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Harga Modal</label>
                                <input type="number" class="form-control" name="harga_modal" required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="categories_id" class="form-control">
                                  @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Berat (gram)</label>
                                <input type="number" class="form-control" name="weight" required/>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Deskripsi Produk</label>
                                <textarea name="description" id="editor" required></textarea>
                              </div>
                            </div>
                              <form runat="server">
                                <div class="col-md-4 col-12">
                                  <div class="gallery-container">
                                    <img id="blah" class="w-100" src="#" alt="" />
                                  </div>
                                </div>
                              </form>
                              <div class="col-12">
                                <input multiple type="file" name="photo" class="form-control" style="display: none"  id="imgInp" />
                                <button
                                  type="button"
                                  class="btn btn-secondary btn-block mt-3"
                                  onclick="thisFileUpload()"
                                >
                                   Tambah Foto
                                </button>
                              </div>
                            {{-- </div> --}}
                          </div>
                          <div class="row">
                            <div class="col text-right mt-4">
                              <button
                                class="btn btn-success btn-block"
                                type="submit"
                              >
                                Tambah Produk
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
<script> src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js%22%3E"</script>
  <script>
    function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
  
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  
  $("#imgInp").change(function() {
    readURL(this);
  });
  </script>
  <script>
    function thisFileUpload() {
      document.getElementById("imgInp").click();
    }
  </script>
@endpush