@extends('layouts.menu')
@section('title')
    Resultado pesquisa
@endsection
<style>
    .distancia{
        margin-top: 5.3em;
    }
</style>
@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><a href="#custom-modal" class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="mdi mdi-plus"></i> Add Member</a></div>
            <!-- end col -->
        </div>
        <!-- end row -->
        
        <div class="row">
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="{{-- {{asset('storage/perfil/'.$item->user_id. '/' . $item->foto)}} --}}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        
                        <h4>{{$obj_merged->nome}}</h4>
                       @foreach ($obj_merged->'0' as $item)
                    <p>{{$item}}</p>
                       @endforeach
                     {{--    <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td class="font-weight-bold">E-Mail</td>
                                    <td>{{$item->email}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Biografia</td>
                                    <td>{{$item->biografia}}</td>
                                </tr>
                                
                            </table>
                        </div>    --}}        
                       <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button>
                    </div>
                </div>
            </div>
        </div>
        
       
     
        
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                   {{--  <div class="d-flex">
                        <small class="py-2">Anterior</small>{{$products->links()}}<small class="py-2">Próximo</small>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>
@endsection