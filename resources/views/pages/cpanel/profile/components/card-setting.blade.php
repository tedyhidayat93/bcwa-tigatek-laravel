<div class="tab-pane active" id="settings">
  <div class="row">
    <div class="col-12">
      <form action="{{ url('cpanel/me/update-profile') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <input class="form-control form-control-sm text-sm bg-light" id="id" type="hidden" name="id" value="{{auth()->user()->id}}" readonly>
          <div class="row">
              <div class="col-md-8">
                  <div class="row">
                      <div class="col-12">
                          <h6 class="text-warning font-weight-bold">Detail Profile</h6>
                          <hr>
                      </div>
                  </div>

                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="name">First Name <small class="text-danger">(*)</small></label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="name" type="text" name="name"
                              placeholder="First Name" value="{{old('name', auth()->user()->name)}}" required>
                          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="lastname">Last Name</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="lastname" type="text" name="lastname"
                              placeholder="Last Name" value="{{old('lastname', auth()->user()->lastname)}}">
                          @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="fullname">Full name & title</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="fullname" type="text" name="fullname"
                              placeholder="Ex: Prof. Lorem Ipsum M.Kom" value="{{old('fullname', auth()->user()->fullname)}}">
                          @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="birthdate">Birthdate</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="birthdate" type="date" name="birthdate" value="{{old('birthdate', auth()->user()->birthdate)}}">
                          @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4">Gender</label>
                      <div class="col-sm-9">
                          <select name="gender" class="form-control form-control-sm form-select">
                              <option value="" selected disabled>Select Gender</option>
                              <option {{auth()->user()->gender == 'male' ? 'selected':''}} value="male">Male</option>
                              <option {{auth()->user()->gender == 'female' ? 'selected':''}} value="female">Female</option>
                          </select>
                          @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="address">Address</label>
                      <div class="col-sm-9">
                          <textarea class="form-control form-control-sm text-sm" id="address" type="text" name="address"
                              placeholder="Optional">{{old('address', auth()->user()->address)}}</textarea>
                          @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="short_bio">Bio</label>
                      <div class="col-sm-9">
                          <textarea class="form-control form-control-sm text-sm" id="short_bio" type="text" name="short_bio"
                              placeholder="Optional">{{old('short_bio', auth()->user()->short_bio)}}</textarea>
                          @error('short_bio') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="about">About Me</label>
                      <div class="col-sm-9">
                          <textarea class="form-control form-control-sm text-sm" rows="5" id="about" type="text" name="about"
                              placeholder="Optional">{{old('about', auth()->user()->about)}}</textarea>
                          @error('about') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="row mt-5">
                      <div class="col-12">
                          <h6 class="text-warning font-weight-bold">Login Access</h6>
                          <hr>
                      </div>
                  </div>

                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="username">Username <small class="text-danger">(*)</small></label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="username" type="text" name="username" placeholder="username"
                              value="{{old('username', auth()->user()->username)}}" disabled required>
                          @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="email">Email <small class="text-danger">(*)</small></label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="email" type="email" name="email" placeholder="mail@mail.com"
                              value="{{old('email', auth()->user()->email)}}" disabled required>
                          @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="password">Password</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="password" type="text" name="password"
                              placeholder="********">
                          <small class="text-info">
                              *) If you don't want to change your password, you don't need to fill it in and just ignore it
                          </small>
                          @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="row mt-5">
                      <div class="col-12">
                          <h6 class="text-warning font-weight-bold">Contact & Social Media</h6>
                          <hr>
                      </div>
                  </div>

                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="phone">Phone</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="phone" type="text" name="phone" placeholder="0812xxxxxxxx"
                              value="{{old('phone', auth()->user()->phone)}}">
                          @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="whatsapp">WhatsApp</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="whatsapp" type="text" name="whatsapp" placeholder="wa.me/0812xxxxxxxxx"
                              value="{{old('whatsapp', (array)json_decode(auth()->user()->social_media))['whatsapp']}}">
                          @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="linkedin">Linked In</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="linkedin" type="text" name="linkedin" placeholder="linkedin.com/in/your-account"
                              value="{{old('linkedin', (array)json_decode(auth()->user()->social_media))['linkedin']}}">
                          @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="instagram">Instagram</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="instagram" type="text" name="instagram" placeholder="instagram.com/your-username"
                              value="{{old('instagram', (array)json_decode(auth()->user()->social_media))['instagram']}}">
                          @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="facebook">Facebook</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="facebook" type="text" name="facebook" placeholder="facebook.com/your-username"
                              value="{{old('facebook', (array)json_decode(auth()->user()->social_media))['facebook']}}">
                          @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="twitter">Twitter</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="twitter" type="text" name="twitter" placeholder="twitter.com/your-username"
                              value="{{old('twitter', (array)json_decode(auth()->user()->social_media))['twitter']}}">
                          @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="tiktok">Tiktok</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="tiktok" type="text" name="tiktok" placeholder="tiktok.com/your-username"
                              value="{{old('tiktok', (array)json_decode(auth()->user()->social_media))['tiktok']}}">
                          @error('tiktok') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-3">
                      <label class="col-sm-3 col-form-label text-md-right pr-4" for="youtube">Youtube</label>
                      <div class="col-sm-9">
                          <input class="form-control form-control-sm text-sm" id="youtube" type="text" name="youtube" placeholder="youtube.com/your-username"
                              value="{{old('youtube', (array)json_decode(auth()->user()->social_media))['youtube']}}">
                          @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
              </div>

              <div class="col-md-4 p-0">
                  <div class="row">
                      <div class="col-md-10 offset-md-1 text-center cursor-pointer">
                          <div class="border rounded p-3 mb-2 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center" id="box-image" onclick="openFileManager()">
                              <input type="file" name="avatar" class="d-none form-control" accept="image/*" id="file-input" onchange="previewImage(event)">
                              <div id="image-container">
                                  @if(auth()->user()->avatar)
                                      <img src="{{asset('uploads/users/avatars/thumb/'.auth()->user()->avatar)}}" class="img-fluid">
                                  @else
                                      <i class="fas fa-upload fa-3x mb-3 text-info"></i>
                                      <h4>Upload Image</h4>
                                      <small>Click here to upload your profile picture</small>
                                  @endif
                              </div>
                          </div>
                          <small class="text-info" id="text-image-hint">*) If you want to change profile picture, click the box above.</small>
                      </div>
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-lg float-right btn-success mt-5"><i class="fas fa-save fa-fw"></i> Update Profile</button>
          {{-- <div class="row bg-light p-3 mt-4">
              <div class="col-12 d-flex align-items-center justify-content-center">
              </div>
          </div> --}}
      </form>
    </div>
  </div>
</div>
