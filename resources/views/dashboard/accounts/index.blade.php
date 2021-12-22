@extends('dashboard.layouts.main')
@section('container')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Account Settings</h1>
</div>

{{-- alert sukses insert data message --}}
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ session('success') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="/dashboard/account" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="form-group">
                <label for="image">Photo Profile</label>
                <div class="d-flex align-items-center">
                    <div class="group-profil">
                        @if (auth()->user()->image)
                            <img class="profil-preview img-fluid" src="{{ asset(auth()->user()->image) }}">
                        @else
                            <img class="profil-preview img-fluid">
                        @endif
                        @error('image')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <input type="file" name='image' class="image-profil" id="image" onchange="previewImage()">
                    </div>
                    <div class="control-profil ml-3">
                        <label class="profile-label" for="image">Photo</label>
                        <button type="button" class="btn-sm btn-primary border-0 d-block deleteImage" onclick="deleteImage()">Delete Photo</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name',auth()->user()->name) }}" class="form-control @error('name') is-invalid @enderror"  autofocus id="name" placeholder="Category Name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ old('username',auth()->user()->username) }}" class="form-control @error('username') is-invalid @enderror"  autofocus id="username" placeholder="Username">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email',auth()->user()->email) }}" class="form-control @error('email') is-invalid @enderror"  autofocus id="email" placeholder="Email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="image">Image</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" onchange="previewImage()" id="image" >
                    <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                @if (auth()->user()->image)
                    <img class="img-preview img-fluid col-sm-3" src="{{ asset(auth()->user()->image) }}">
                @else
                    <img class="img-preview img-fluid col-sm-3">
                @endif
                @error('image')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div> --}}
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
@push('addon-script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.profil-preview');
            const label = document.querySelector('.profile-label');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                label.innerHTML = image.files[0]['name'];
                imgPreview.alt = 'preview';
            }
        }
        function deleteImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.profil-preview');
            const deleteButton = document.querySelector('.deleteImage');
            imgPreview.src = null;
            image.value = 'sdsds';
            return false;
        }
    </script>
@endpush