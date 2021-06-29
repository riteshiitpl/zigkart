@php
$activeName = \Request::segment(1); 
@endphp
@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>Chat with user</title>
@include('style')
</head>
<body>
@include('header')
    <section class="headerbg myprofile">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2044,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2044,$translate) }}</span></p>
      </div>
    </section>
 <main role="main">
      <div class="container-fluid page-white-box mt-3">
         <div>
             @if ($message = Session::get('success'))
             <div class="alert alert-success" role="alert">
                 <span class="alert_icon lnr lnr-checkmark-circle"></span>
                     {{ $message }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                     </button>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                   {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                     </button>
            </div>
            @endif
            @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            @endif
            </div>
           <div class="row">
            @include('layouts.user_sidenavbar')
            <div class="col-md-10">
                <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
             
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @if(!empty($list_data))
                        @foreach($list_data as $list_data)
                        <tr>
                            <td>
                              <div class="icheck-primary">
                                <input type="checkbox" value="" id="check1">
                                <label for="check1"></label>
                              </div>
                            </td>
                            <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                            <td class="mailbox-name">
                                <a href="{{ url('inbox/'.$list_data->id) }}">
                                {{ (Auth::user()->user_type == 'vendor') ? $list_data->user_info->name : $list_data->vendor_info->name }}
                                </a>
                            </td>
                            <td class="mailbox-subject">
                                @if(!empty($list_data->last_msg))
                                    {!! $list_data->last_msg[0]->message !!}
                                @endif
                            </td>
                            <td class="mailbox-date">
                                @if(!empty($list_data->last_msg))
                                    {{$list_data->last_msg[0]->created_at }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                No Chat data found
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>  

         	</div>
         </div>
      </div>
    </main>
@include('footer')
@include('javascript')
</body>
</html>
@else
@include('503')
@endif