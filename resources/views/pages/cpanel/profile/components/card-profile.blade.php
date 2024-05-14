<div class="card card-warning card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img border-light shadow-sm img-fluid img-circle" src="{{$avatar}}">
        </div>

        <h3 class="profile-username text-center mt-2 mb-1">{{auth()->user()->name}}</h3>

        <p class="text-muted text-center m-0">Joined: <b class="text-success">
                {{ date('d F Y',  strtotime(auth()->user()->created_at)); }} </b></p>


                <p class="text-center mt-1">
                    @foreach (auth()->user()->getRoleNames() as $role)
                        <span class="badge bg-warning">{{$role}}</span>
                    @endforeach
                </p>

          <ul class="list-group list-group-unbordered mb-3 mt-3">
            <li class="list-group-item">
                <b>Your Article</b> <a class="float-right font-weight-bold">{{auth()->user()->articles->count()}} Post</a>
            </li>
        </ul>
    </div>
</div>
