@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2912,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
    <section class="headerbg myprofile">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2912,$translate) }} {{ Helper::translation(2918,$translate) }} </h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2912,$translate) }}</span></p>
      </div>
    </section>
   <main role="main">
      <div class="container-fluid page-white-box mt-3">
      <div>
        @if ($message = Session::get('success'))
         <div class="alert alert-success" role="alert">
           <span class="alert_icon lnr lnr-checkmark-circle"></span>
             {!! $message !!}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span class="fa fa-close" aria-hidden="true"></span>
             </button>
         </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
           <span class="alert_icon lnr lnr-warning"></span>
             {!! $message !!}
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
           <div class="col-md-10 mt-1 mb-1 pt-1 pb-1">
                <div class="container emp-profile">
                  <div class="row">
                  
                  <div class="col-md-12 ash-bg">
                        <div class="comments">
        <div class="comment-wrap">
                <div class="photo">
                @php 
                $uphoto = Auth::user()->user_photo; 
                if($uphoto != "")
                {
                $path = 'public/storage/users/'.$uphoto;
                }
                else
                {
                 $path = 'public/img/no-user.png';
                }
                @endphp
                        <div class="avatar" style="background-image: url('{{ url('/') }}/{{ $path }}')"></div>
                </div>
                <div class="comment-block">
                        <form method="POST" action="{{ route('inbox.store') }}" id="conversation_form"  enctype="multipart/form-data">
                        @csrf
                                <textarea name="message" id="" cols="30" rows="3" placeholder="{{ Helper::translation(2928,$translate) }}" data-bvalidator="required"></textarea>
                                
                                <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="inbox_id" value="{{ $messageList[0]->id }}">
                                @if(Auth::user()->user_type == 'customer')
                                    <input type="hidden" name="receiver_id" value="{{ $messageList[0]->vendor_id }}">
                                @else
                                    <input type="hidden" name="receiver_id" value="{{ $messageList[0]->user_id }}">
                                @endif
                                <input type="submit" value="{{ Helper::translation(2931,$translate) }}" class="btn button-color btn-sm px-4 py-2"> 
                                @if(Auth::user()->user_type == 'vendor')
                                    <button type="button" class="btn btn-info btn-sm px-4 py-2" data-toggle="modal" data-target="#vendor_quotation">Create quote</button>
                                @endif
                        </form>
                </div>
        </div>
        <div id="listShow" class="message-height">

            @foreach($messageList[0]->message as $data)
            
                <div class="comment-wrap li-item">
                        <div class="photo">
                               @php 
                                $uphoto = $data->sender_info->user_photo; 
                                if($uphoto != "")
                                {
                                $paths = 'public/storage/users/'.$uphoto;
                                }
                                else
                                {
                                 $paths = 'public/img/no-user.png';
                                }
                                @endphp 
                            <div class="avatar"style="background-image: url('{{ url('/') }}/{{ $paths }}')">
                                
                            </div>
                        </div>
                        <div class="comment-block">
                                <p><b>{{ $data->sender_info->name }}</b></p>
                                <p class="comment-text">{!! $data->message !!}</p>
                                <div class="bottom-comment">
                                        <div class="comment-date">
                                            {{ ZigKart\Helpers\Helper::humanReadDate($data->updated_at)}}
                                        </div>
                                        
                                </div>
                        </div>
                </div>
            @endforeach
        

        </div>
        <div class="row mt-9" align="center">
              <div class="turn-page" id="pager"></div>
         </div>
         </div>
         </div>
        </div>
            </div>
           </div>
         </div>
      </div>
    </main>
    @include('footer')
    @include('javascript')

    @include('component.vendor_quotation')

  </body>
</html>
@else
@include('503')
@endif