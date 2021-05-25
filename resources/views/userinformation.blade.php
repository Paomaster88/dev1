@extends('layouts.master')
@section('title', 'Laravel-Test || USER')
@section('main-content')

    <div class="container mt-4">

        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.notification')
                </div>
            </div>
            <form method="POST" action="{{ route('update.userinfo', $user->id) }}">
                {{ csrf_field() }}
                @csrf

                <div class="card" style="border: none;">
                    <div class=" row">
                        <div class="col-md-4">
                            <div class="card card-box"
                                style="border: none; border-top-right-radius: 0;border-bottom-right-radius: 0;">
                                <div class="image d-flex justify-content-center mt-3">
                                    @if ($user->image != null)
                                        <img class="card-img-top img-fluid roundend-circle mt-4"
                                            style="height:410px;width:230px;" src="{{ $user->image }}"
                                            alt="profile picture">
                                    @else
                                        <img class="card-img img-fluid mt-5" style="height:410px;width:230px;"
                                            src="{{ asset('images/white-backgroud.jpg') }}" alt="profile_picture">
                                    @endif
                                </div>

                                {{-- <p class="d-flex justify-content-center mt-3"><a type="file"
                                        class="btn btn-dark btn-default" name="image">UPLOAD PHOTO</a></p> --}}
                                <p class="d-flex justify-content-center mt-3">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-dark btn-default text-white">
                                        UPLOAD PHOTO
                                    </a>
                                </p>
                                <input id="thumbnail" class="form-control" type="hidden" name="image"
                                    value="{{ old('image') }}">
                                <div id="holder" class=" d-flex justify-content-center mt-3 my-3">
                                </div>
                                @error('photo_cert')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7 ml-1">
                            <div class="col-md-12 mt-2">
                                <h3 class="text-dark">Information</h3>
                            </div>
                            <hr>
                            <div class="pr-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id" class="col-form-label font-weight-bold">ID No.</label>
                                        <input id="id" type="text" name="id" value="{{ $user->id }}"
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="branch" class="col-form-label font-weight-bold">Branch</label>
                                        <input id="branch" type="text" name="branch" value="{{ $user->branch }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="firstname_th" class="col-form-label font-weight-bold">ชื่อ</label>
                                        <input id="firstname_th" type="text" name="firstname_th"
                                            value="{{ $user->firstname_th }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastname_th" class="col-form-label font-weight-bold">นามสกุล</label>
                                        <input id="lastname_th" type="text" name="lastname_th"
                                            value="{{ $user->lastname_th }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="firstname" class="col-form-label font-weight-bold">Name</label>
                                        <input id="firstname" type="text" name="firstname" value="{{ $user->firstname }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastname" class="col-form-label font-weight-bold">Surname</label>
                                        <input id="lastname" type="text" name="lastname" value="{{ $user->lastname }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="spell_name" class="col-form-label font-weight-bold">Spell the
                                            name</label>
                                        <input id="spell_name" type="text" name="spell_name"
                                            value="{{ $user->spell_name }}" class="form-control"><br>

                                        <div class=" d-flex">
                                            <label class="checkbox-inline"><input name="accept" type="checkbox"
                                                    class="mr-2">Accept
                                                privacy & policy</label>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse mb-4 mx-2">
                                    <button type="submit" class="btn  btn-primary  btn-sm ml-2"
                                        style="width: 80px">Submit</button>
                                    <a type="button" class="btn btn-outline-primary btn-sm" style="width: 80px"
                                        href="#">Edit</a>
                                </div>
                            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <div class="award">
        <div class="card my-5">
            <div class="card-body">
                <h5 class="card-title text-dark">Award</h5>
                <div class="inner">
                    <hr>
                </div>
                <p class="card-text" style="font-size: 12px"><i class="fas fa-sort-up"
                        style="transform: rotate(90deg);"></i>
                    รางวัลนักเรียนที่เรียบจบระบบสุดท้ายในวิชาภาษาอังกฤษ
                    EPL
                    เรียนจบระบบ | II200
                    ในวิชาการอ่านภาษาไทย เรียนเกินชั้นเรียน 5 ปีขึ้นไปในวิชาคณิตศาสตร์ วิชาภาษาอังกฤษ EPL
                    และวิชาการอ่านภาษาไทย</p>
            </div>
        </div>
    </div>
    </div>

    <style>
        .card-box {
            background-color: rgb(10, 41, 165);
        }

        hr {
            height: 2px;
            background-color: rgb(10, 41, 165);
            border: none;
        }

        .award h5 {
            line-height: 1;
            font-size: 2rem;
            color: black;
        }

    </style>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');

    </script>



@endsection
