@extends('layouts.Admin.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <h4 class="w-100"><i class="fa fa-bullhorn"><b></i> CAGAYAN STATE UNIVERSITY - APARRI CAMPUS ROOMS INFORMATION</h4></b>


                <form method="POST" action="{{ route('admin.room.store') }}">
                    @csrf
                    <input type="hidden" name="building_id" value="{{ request()->get('building_id') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                    <label for="room_id" style="font-weight: bold;margin-bottom:0;">Room Id</label>
                                    <input type="text" class="form-control" name="room_id" style="width: 80%;" required><br>

                                    <label for="room_area" style="margin-bottom:0;">Room Area</label>
                                    <input type="text"  class="form-control" name="room_area" style="width: 80%;" required><br>

                                    <label for="room_capacity" style="margin-bottom:0;">Room Capacity</label>
                                    <input type="text"  class="form-control" name="room_capacity" style="width: 80%;" required><br>

                                    <label for="room_door"><b>Doors</b></label>
                                    <input type="text"  class="form-control" name="room_door" style="width: 80%;" required><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                    <label for="room_window"><b>Windows</b></label>
                                    <input type="text"  class="form-control" name="room_window" style="width: 80%;" required><br>

                                    <label for="room_size"><b>Room Size</b></label>
                                    <input type="text"  class="form-control" name="room_size" style="width: 80%;" required><br>

                                    <label for="room_use"><b>Room Use</b></label>
                                    <input type="text"  class="form-control" name="room_use" style="width: 80%;" required><br>

                                    <label for="room_remark"><b>Room Remark</b></label>
                                    <input type="text"  class="form-control" name="room_remark" style="width: 80%;" required><br>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="display: flex; justify-content: flex-end;">
                            <button type="submit" class="btn btn-flat btn-success" style="background-color: #adad85; color: white;">
                                <i class="fa fa-check-circle"></i> Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
