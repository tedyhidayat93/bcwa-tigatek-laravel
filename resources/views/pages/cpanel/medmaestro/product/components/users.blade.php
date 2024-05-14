<div class="card shadow-none border">
    <div class="card-header bg-dark clearfix">
        <h6 class="m-0 float-left">
            <i class="fas fa-users p-1 bg-warning shadow-sm rounded mr-1" style="font-size:16px;"></i>
            User Accounts
        </h6>
        <a href="{{url('cpanel/user-management/users/create?partner='. $data->id)}}" class="btn btn-sm btn-success text-white float-right">
            <i class="fas fa-user-plus"></i> Add User
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm table-hover">
            <thead>
                <tr class="bg-gray">
                    <th width="80">
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Created At
                    </th>
                    <th width="130">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->users as $user)
                <tr>
                    <td>
                        <div class="tbl-img bg-light shadow-sm">
                            @php
                                switch (true) {
                                    case (empty($user->avatar) && $user->gender == 'male'):
                                        $avatar = config('constants.default_ava_male');
                                        break;
                                    case (empty($user->avatar) && $user->gender == 'female'):
                                        $avatar = config('constants.default_ava_female');
                                        break;
                                    case (!empty($user->avatar)):
                                        $avatar = asset('uploads/users/avatars/thumb/'.$user->avatar);
                                        break;
                                    default:
                                        $avatar = config('constants.default_ava');
                                        break;
                                }
                            @endphp
                            <img src="{{ $avatar }}" alt="{{$user->name}}">
                        </div>
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{ date('d/m/Y', strtotime($user->created_at))}}</td>
                    <td>
                        @can('update user')
                        <a href="{{ url('cpanel/user-management/users/'.$user->id.'/edit?partner='.$data->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pen"></i>
                        </a>
                        @endcan
                        
                        @can('delete user')
                        <a href="{{ url('cpanel/user-management/users/'.$user->id.'/delete?partner='.$data->id) }}" class="btn btn-danger btn-sm btn-delete">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>