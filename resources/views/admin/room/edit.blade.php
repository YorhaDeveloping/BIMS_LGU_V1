@extends('layouts.Admin.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h4 class="w-100"><i class="fa fa-bullhorn"></i> CAGAYAN STATE UNIVERSITY - APARRI CAMPUS ROOMS INFORMATION</h4>

                <form action="{{ route('admin.room.update', $rooms->id) }}" method="POST" class="was-validated">
                    @csrf
                    @method('PUT')
                    <div class="py-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="room_id" font-weight: bold;>Room Id</label><br>
                                <input type="text" name="room_id" value="{{ $rooms->room_id}}" style="width: 80%;" required>
                            </div><br>

                            <div class="col-sm-4">
                                <label for="room_area">Room Area</label><br>
                                <input type="text" name="room_area" value="{{ $rooms->room_area}}" style="width: 80%;" required>
                            </div><br>
                            
                            <div class="col-sm-4">
                                <label for="room_capacity">Room Capacity</label><br>
                                <input type="text" name="room_capacity"  value="{{ $rooms->room_capacity}}" style="width: 80%;" required>
                            </div><br><br>

                            <div class="col-sm-4">
                                <label for="room_door">Doors</label><br>
                                <input type="text" name="room_door" value="{{ $rooms->room_door}}" style="width: 80%;" required>
                            </div><br>

                            <div class="col-sm-4">
                                <label for="room_window">Windows</label><br>
                                <input type="text" name="room_window" value="{{ $rooms->room_window}}" style="width: 80%;" required>
                            </div><br>

                            <div class="col-sm-4">
                                <label for="room_size">Room Size</label><br>
                                <input type="text" name="room_size" value="{{ $rooms->room_size}}" style="width: 80%;" required>
                            </div><br>

                            <div class="col-sm-4">
                                <label for="room_use">Room Use</label><br>
                                <input type="text" name="room_use" value="{{ $rooms->room_use}}" style="width: 80%;" required>
                            </div><br>

                            <div class="col-sm-4">
                                <label for="room_remark">Room Remark</label><br>
                                <input type="text" name="room_remark" value="{{ $rooms->room_remark}}" style="width: 80%;" required>
                            </div><br>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="margin-right: 10px;">
                            <i class="fa fa-check-circle"></i> Update
                        </button>

                        <a href="{{ route('admin.room.index', $rooms->id) }}" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
