@php
$activeName = \Request::segment(1); 
@endphp
@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>@if(Auth::user()->user_type == 'vendor'){{ Helper::translation(1921,$translate) }}@else{{ Helper::translation(1912,$translate) }}@endif  - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
@if(Auth::user()->user_type == 'vendor')
    <section class="headerbg myprofile">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(1921,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(1921,$translate) }}</span></p>
      </div>
    </section>
    <main role="main">
     <div class="container-fluid page-white-box mt-3">
     <div class="row mb-2">
           <div class="col-md-12 text-right">
           <a href="{{ URL::to('/add-attribute-value') }}" class="btn button-color"><i class="fa fa-plus"></i> {{ Helper::translation(1920,$translate) }}</a>
           </div>
        </div>
     <div class="row">
	     <div class="col-md-12">
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
        </div>
        <div class="row">
            @include('layouts.user_sidenavbar')
        <div class="col-md-10">
          <div class="table-responsive">
             <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(1964,$translate) }}</th>
                                            <th>{{ Helper::translation(1914,$translate) }}</th>
                                            <th>{{ Helper::translation(1921,$translate) }}</th>
                                            <th>{{ Helper::translation(1934,$translate) }} {{ $allsettings->site_currency_symbol }}</th>
                                            <th>{{ Helper::translation(1915,$translate) }}</th>
                                            <th>{{ Helper::translation(1965,$translate) }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($valueData['view'] as $value)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $value->attribute_name }} </td>
                                            <td>{{ $value->attribute_value }} </td>
                                            <td>{{ $allsettings->site_currency_symbol }}{{ $value->attribute_value_price }} </td>
                                           <td>@if($value->attribute_value_status == 1) <span class="badge badge-success">{{ Helper::translation(1916,$translate) }}</span> @else <span class="badge badge-danger">{{ Helper::translation(1917,$translate) }}</span> @endif</td>                               <td>
                                            @if(Auth::user()->id == $value->user_user_id)
                                            <a href="edit-attribute-value/{{ base64_encode($value->attribute_value_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(1966,$translate) }}</a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(1967,$translate) }}</a>
                                            @else 
                                            <a href="attribute-value/{{ base64_encode($value->attribute_value_id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation(1968,$translate) }}');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(1967,$translate) }}</a>@endif @else
                                           <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onClick="alert('{{ Helper::translation(1971,$translate) }}');"><i class="fa fa-ban"></i>&nbsp; {{ Helper::translation(1966,$translate) }}</a>
                                           <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onClick="alert('{{ Helper::translation(1972,$translate) }}');"><i class="fa fa-ban"></i>&nbsp;{{ Helper::translation(1967,$translate) }}</a>  
                                             @endif</td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach     
                  </tbody>
                </table>
             </div>
        </div>
    </div>
</div>
</main>
@else
@include('not-found')
@endif
@include('footer')
@include('javascript')
</body>
</html>
@else
@include('503')
@endif