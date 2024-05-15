<div class="card mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Add New'}} Transaksi
        </h6>
    </div>

    <div class="card-body">
        <form action="{{$method == 'post' ? route('cpanel.transaction.store') : route('cpanel.transaction.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <div class="row">
                <div class="px-md-3 col-md-7 offset-md-1">

                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-12 col-sm-10">
                            <h6 class="text-teal font-weight-bold">Biodata</h6>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="name">Name <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-7" id="name" type="text" name="name"
                            placeholder="Input name" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="short_bio">Short Bio</label>
                        <input class="form-control text-sm col-sm-7" id="short_bio" type="text" name="short_bio"
                            placeholder="Optional" value="{{$data->short_bio}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="description">Description</label>
                        <textarea class="form-control text-sm col-sm-7" id="description" type="text" rows="5" name="description"
                            placeholder="Optional">{{$data->description}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="avatar">Upload Image</label>
                        <div class="col-sm-7 p-0">
                            <input class="form-control text-sm" accept="image/*" id="avatar" type="file" name="avatar"
                                placeholder="Optional" value="{{$data->avatar}}">
                            <small>Resolution: <b> 800 x 800 px (Square)</b></small>
                            @if($method == 'put' && $data->avatar)
                            <br>
                            <img src="{{asset('uploads/transactions/thumb/'.$data->avatar)}}"
                                class="img-fluid w-50 img-thumbnail mt-2">
                            @endif
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-sm-2"></div>
                        <div class="col-12 col-sm-10">
                            <h6 class="text-teal font-weight-bold">Contact & Social Media</h6>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="phone">Phone</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="phone" type="text" name="phone" placeholder="0812xxxxxxxx"
                                value="{{old('phone', $data->phone)}}">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="whatsapp">WhatsApp</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="whatsapp" type="text" name="whatsapp" placeholder="wa.me/0812xxxxxxxxx"
                                value="{{old('whatsapp', $data->whatsapp)}}">
                            @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="linkedin">Linked In</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="linkedin" type="text" name="linkedin" placeholder="linkedin.com/in/your-account"
                                value="{{old('linkedin', $data->linkedin)}}">
                            @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="instagram">Instagram</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="instagram" type="text" name="instagram" placeholder="instagram.com/your-username"
                                value="{{old('instagram', $data->instagram)}}">
                            @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="facebook">Facebook</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="facebook" type="text" name="facebook" placeholder="facebook.com/your-username"
                                value="{{old('facebook', $data->facebook)}}">
                            @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="twitter">Twitter</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="twitter" type="text" name="twitter" placeholder="twitter.com/your-username"
                                value="{{old('twitter', $data->twitter)}}">
                            @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="tiktok">Tiktok</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="tiktok" type="text" name="tiktok" placeholder="tiktok.com/your-username"
                                value="{{old('tiktok', $data->tiktok)}}">
                            @error('tiktok') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="youtube">Youtube</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm text-sm" id="youtube" type="text" name="youtube" placeholder="youtube.com/your-username"
                                value="{{old('youtube', $data->youtube)}}">
                            @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7 p-0 d-flex align-items-center justify-content-end">
                            <a href="{{route('cpanel.transaction.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
