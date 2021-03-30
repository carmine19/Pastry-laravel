@extends('layouts.app')

@section('content')

    <div id="single-guest">
        <div class="hero-main">
            <h2 class="text-capitalize">{{$sweets->name}}</h2>
            <div class="jumbotron jumbotron-fluid" id="hero"
                 style="background: url('{{asset('storage/' . $sweets->cover)}}');
                     background-position: center;
                     background-repeat: no-repeat;
                     background-size: cover;">
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div id="product-show">
                        <div class="box-title mt-3 mb-5">
                            <h2 class="text-capitalize">{{$sweets->name}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    @if($sweets->visibility)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('storage/' . $sweets->cover)}}" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="text-capitalize">{{$sweets->name}}</h3>
                            <p class="card-text text-truncate">{{$sweets->description}}</p>
                                    {{--  {{ date('Y-m-d H:i:s') }}  {{$sweet->created_at}}  --}}
                                    @if( $sweets->created_at->format('d')  == $data->today()->day  )
                                        <p class="card-text">{{$sweets->price}} 
                                            €</p>  
                                    @elseif( $sweets->created_at->format('d') + 1 == $data->today()->day )
                                        <p class="card-text">{{ ((number_format((float)$sweets->price, 1)) / 100) * 80 }}
                                            €</p> 
                                    @elseif( $sweets->created_at->format('d') + 2 == $data->today()->day )
                                        <p class="card-text">{{ ((number_format((float)$sweets->price, 1)) / 100) * 20 }}
                                            €</p>  
                                    @endif

                                    
                                    @if( $sweets->created_at->format('d')  == $data->today()->day  )
                                        <a href="" class="btn btn-primary">Compra</a>
                                    @elseif( $sweets->created_at->format('d') + 1 == $data->today()->day )
                                        <a href="" class="btn btn-primary">Compra, -20%</a>
                                    @elseif( $sweets->created_at->format('d') + 2 == $data->today()->day )
                                        <a href="" class="btn btn-primary">Compra, -80%</a>
                                    @else
                                         <a href="" class="btn btn-primary">Prodotto esaurito</a>
                                    @endif
                        </div>
                    </div>
                    @endif
                </div>


                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        Ingredienti:
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{$sweets->ingredients}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                        Descizione:
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                   <p>{{$sweets->description}}</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

@endsection
