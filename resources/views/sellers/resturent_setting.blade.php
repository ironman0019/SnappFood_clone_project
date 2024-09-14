<x-seller_home_layout>
    <section class="m-3">
        <h2>Setting</h2>
        <div class="d-flex justify-content-center">
            <form action="/seller/dashbord/resturent_status" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select " name="status">
                        <option selected value="closed">Closed</option>
                        <option value="open">Open</option>
                    </select>
                    <h6 class="mt-2 mx-2">{{$resturent->status}}</h6>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-primary mx-5 my-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Open Resturent other settings
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static">
            <!-- prevent modal to not close after getting valid error -->
            @if(session()->has('error'))
            <script>
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();
            </script>
            @endif
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Resturent setting</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/seller/dashbord/resturent_setting" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Resturent's Name</label>
                                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{$resturent->name}}">
                                @error('name')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">
                                    Resturent logo
                                </label>
                                <input type="file" class="form-control" name="photo" value=""/>
                                <img class="tw-w-32 tw-mt-5" src="{{$resturent->photo ? asset('storage/' . $resturent->photo) : asset('/images/snappFood_logo.png')}}" alt="image">
                                @error('photo')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Resturent type</label>
                                <select class="form-select" name="tag">
                                    <option selected value="{{$resturent->tag}}">{{$resturent->tag}}</option>
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->tag}}">{{$tag->tag}}</option>
                                    @endforeach
                                </select>
                                @error('tag')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Telephone</label>
                                <input type="text" class="form-control" id="" name="phone" value="{{$resturent->phone}}">
                                @error('phone')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control" id="" name="address" value="{{$resturent->address}}">
                                @error('address')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">City</label>
                                <input type="text" class="form-control" id="" name="city" value="{{$resturent->city}}">
                                @error('city')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Delivary price</label>
                                <input type="text" class="form-control" id="" name="delivary_price" value="{{$resturent->delivary_price}}">
                                @error('delivary_price')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                                <div id="emailHelp" class="form-text">Toman</div>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <div class="w-25">
                                    <label for="exampleInputEmail1" class="form-label">open hours</label>
                                    <select class="form-select" name="work_hours">
                                        <option selected value="0">Choose</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    @error('work_hours')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="w-25 mx-5">
                                    <label for="exampleInputEmail1" class="form-label">until:</label>
                                    <select class="form-select" name="work_hours2">
                                        <option selected value="0">Choose</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                    </select>
                                    @error('work_hours2')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="" class="form-label">Bank info</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">IR-</span>
                                    <input type="text" class="form-control" id="" name="bank">
                                </div>
                                <div id="" class="form-text">Shaba number on your creadit card</div>
                                @error('bank')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div> -->
                            <button type="submit" class="btn btn-outline-danger tw-mx-36 px-5 ">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-seller_home_layout>