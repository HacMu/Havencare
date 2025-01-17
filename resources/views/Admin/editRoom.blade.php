@extends('Admin.adminMaster')

@section('title', 'Edit - Room')

@section('pageHeader', 'Rooms Management')

@section('content')
    <?php
    if (count($errors) > 0) {
        foreach ($errors->all() as $item) {
            Alert::toast($item, 'error');
        }
    }
    ?>

    <div class="align-items-center" style="margin-top:64px">
        <div class="row">
            <div class="col">
                <!--Room information-->
                <div class="card mb-4  shadow">
                    <div class="card-header border-0"
                        style="background: rgb(0,160,153);background: linear-gradient(90deg, rgba(0,160,153,1) 0%, rgba(65,105,225,1) 100%);color:white">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="ml-2">Edit {{ $room->oda_adi }} information</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="mb-0" action="{{route('admin.update.room',$room->id)}}" style="margin-bottom: 32px">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control bg-light border-0 shadow-sm  rounded"
                                            id="floatingInput" name="oda_adi" placeholder="#"
                                            value="{{ $room->oda_adi }}" required>
                                        <label for="floatingInput">Room name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control bg-light border-0 shadow-sm  rounded"
                                            id="floatingInput" name="oda_numarasi" placeholder="#"
                                            value="{{ $room->oda_numarasi }}" required>
                                        <label for="floatingInput">Room NO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control bg-light border-0 shadow-sm  rounded"
                                            id="floatingInput" name="yatak_sayisi" placeholder="#"
                                            value="{{ $room->yatak_sayisi }}" required>
                                        <label for="floatingInput">Bed number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <select class="form-select bg-light border-0 shadow-sm  rounded" id="floatingSelect"
                                            name="bolum_id" aria-label="Floating label select example" required>
                                            @foreach ($departments as $department)
                                                <option value="{{$department->id}}" {{($room->department->bolum_adi  == $department->bolum_adi ) ? 'selected':''}}>{{ $department->bolum_adi }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Department</label>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation example mt-4 ">
                                <ul class="pagination justify-content-between">
                                    <li class="page-item">
                                        <a href="{{ route('admin.hospital.rooms') }}"" type="reset"
                                            class="btn btn-light border-0">Cancle</a>
                                    </li>
                                    <li class="page-item">
                                        <button type="submit" class="page-link btn-light border-0 rounded shadow-sm"
                                            style="background-color:#00a099;color: white"><i
                                                class="fa-solid fa-check mr-2"></i><b>Save</b></button>
                                    </li>
                                </ul>
                            </nav>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
