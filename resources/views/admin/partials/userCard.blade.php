<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 profile_details margin_bottom_30">
    <div class="contact_blog">
        <h4 class="brief">
            {{ $user->role_id == 1 ? 'User' : 'Admin'}}
        </h4>
        <div class="contact_inner">
            <div class="left">
                <h3>{{$user->name}}  {{$user->last_name}}</h3>
                <ul class="list-unstyled">
                    <li><i class="fa fa-envelope-o"></i> : {{$user->email}}</li>
                    <li><i class="fa fa-phone"></i> : {{$user->phone}}</li>
                </ul>
            </div>
            <div class="right">
                <div class="profile_contacts">
                    <img class="img-responsive" src="{{asset('assets/img/avatar') .'/'. $user->avatar}}" alt="avatar{{$user->name}}" />
                </div>
            </div>
            <div class="bottom_list">
                <div class="right_button">
                    <a href="{{route('admin.user.profile',[$user->id])}}" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i>
                        View Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
