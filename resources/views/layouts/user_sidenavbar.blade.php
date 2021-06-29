@php
$activeName = \Request::segment(1); 
@endphp
<style>
.list-group-item.active{
    background-color: #fe6b38;
    border-color: #fe6b38;
}
.list-group2 a{
    color: #555555;
}
.thumbprofile{
   float: none;
    margin: 0 auto;
    width: 70%;
    height: 70%;
    display: block;
    -webkit-border-radius: 50% !important;
}
.profile-usertitle {
    text-align: center;
    margin-top: 20px;
}
.profile-usertitle-name {
    color: #5a7391;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 7px;
}
.profile-usertitle-job {
    text-transform: uppercase;
    color: #5b9bd1;
    font-size: 13px;
    font-weight: 800;
    margin-bottom: 7px;
}
.image {
     height: 8vw; 
     width: 8vw; 
    border: 2px ;
    border-radius: 50%;
    box-shadow: 0 0 5px gray;
   
} 
</style>
<div class="col-md-2">
    <div class="list-group2">
       <!--  <a href="#" class="list-group-item active"><i class="fa fa-key"></i> <span>My account</span></a> -->
        @if(Auth::user()->user_type == 'customer')
        
        <a href="{{url('my-profile')}}" class="list-group-item "><img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" class="thumbprofile image" alt="{{Auth::user()->name }}">
        <div class="profile-usertitle"><div class="profile-usertitle-name">{{Auth::user()->name}}</div>
     <div class="profile-usertitle-job">{{Auth::user()->user_type}}</div>
      </div>
       <a href="{{url('my-profile')}}" class="list-group-item {{ ( $activeName =='my-profile')?'active':'' }}"><i class="fa fa-question-circle"></i> <span>{{ Helper::translation(2042,$translate) }}</span></a>
        <a href="{{url('my-purchase')}}" class="list-group-item {{ ( $activeName =='my-purchase')?'active':'' }}"><i class="fa fa-compass"></i> <span>{{ Helper::translation(2044,$translate) }}</span></a>
        <a href="{{url('my-wallet')}}" class="list-group-item {{ ( $activeName =='my-wallet')?'active':'' }}"><i class="fa fa-compass"></i> <span>{{ Helper::translation(2045,$translate) }}</span></a>
        @endif
        @if(Auth::user()->user_type == 'vendor')
     
        <a href="{{url('my-profile')}}" class="list-group-item"><img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" class="thumbprofile image" alt="{{Auth::user()->name }}">
        <div class="profile-usertitle"><div class="profile-usertitle-name">{{Auth::user()->name}}</div>
     <div class="profile-usertitle-job">{{Auth::user()->user_type}}</div>
      </div></a>
        <a href="{{url('my-profile')}}" class="list-group-item {{ ( $activeName =='my-profile')?'active':'' }}"><i class="fa fa-question-circle"></i> <span>{{ Helper::translation(2042,$translate) }}</span></a>
        <a href="{{url('my-product')}}" class="list-group-item {{ ( $activeName =='my-product')?'active':'' }}"><i class="fa fa-question-circle"></i> <span>{{ Helper::translation(2046,$translate) }}</span></a>
        <a href="{{url('attribute-type')}}" class="list-group-item {{ ( $activeName =='attribute-type')?'active':'' }}"><i class="fa fa-question-circle"></i> <span>{{ Helper::translation(1914,$translate) }}</span></a>
        <a href="{{url('attribute-value')}}" class="list-group-item {{ ( $activeName =='attribute-value')?'active':'' }}"><i class="fa fa-book"></i> <span>{{ Helper::translation(1921,$translate) }}</span></a>
        <a href="{{url('my-coupon')}}" class="list-group-item {{ ( $activeName =='my-coupon')?'active':'' }}"><i class="fa fa-compass"></i> <span>{{ Helper::translation(2047,$translate) }}</span></a>
        <a href="{{url('my-orders')}}" class="list-group-item {{ ( $activeName =='my-orders')?'active':'' }}"><i class="fa fa-compass"></i> <span>{{ Helper::translation(2026,$translate) }}</span></a>
        <a href="{{url('my-purchase')}}" class="list-group-item {{ ( $activeName =='my-purchase')?'active':'' }}"><i class="fa fa-compass"></i> <span>{{ Helper::translation(2044,$translate) }}</span></a>
        <a href="{{url('my-wallet')}}" class="list-group-item {{ ( $activeName =='my-wallet')?'active':'' }}"><i class="fa fa-compass"></i> <span>{{ Helper::translation(2045,$translate) }}</span></a>
        @endif
        <a href="{{url('inbox')}}" class="list-group-item {{ ( $activeName =='inbox')?'active':'' }}">
            <i class="fa fa-envelope"></i> 
            <span>inbox</span>
            <span class="badge badge-success float-right">{{ ZigKart\Models\Inbox::all_unread_msg() }}</span>
        </a>
        
        <a href="{{url('logout')}}" class="list-group-item {{ ( $activeName =='logout')?'active':'' }}"><i class="fa fa-compass"></i> <span>{{ Helper::translation(2048,$translate) }}</span></a>
     </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;

        $('.list-group2 .list-group-item a[href="'+ url +'"]').parent().addClass('active');
        $('.list-group2 a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 

