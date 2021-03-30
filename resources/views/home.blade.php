@extends('layouts.app')

@section('content')

    <div id="home-guest">

  
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="box-img">
                    <img src="{{ asset('images/cafe-bibbona-badge.svg')}}" alt="" class="img-fluid mx-auto d-block" width="300px">
                </div>
            </div>
        </div>

        <section id="hero-section" class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="main-box main-box-left">
                            <div class="box-title">
                                <h2>Delightful Oreo Muffins</h2>
                            </div>
                            <div class="box-p">
                                <p>Made with wholegrain flour, dark chocolate and custom home-made cookies. A piece of
                                    heaven, a true indulgence for the senses.
                                    We bake them every day of the week so stop by for one or two with a fresh cup of
                                    capuccino. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main-box main-box-right">
                            <div class="box-img">
                                <img src="{{asset('images/oreo-muffins.jpg')}}" alt="" style="width:100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="special_list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="main-box">
                            <div class="box-img">
                                <img src="{{asset('images/macarons.jpg')}}" alt="" width="100%">
                            </div>
                            <div class="box-text">
                                <h3>Title</h3>
                                <i class="fas fa-arrow-circle-down fa-2x arrow_down"></i>
                                <p class="p_arrow_down">description</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="main-box">
                            <div class="box-img">
                                <img src="{{asset('images/cheesecake.jpg')}}" alt="" width="100%">
                            </div>
                            <div class="box-text">
                                <h3>Title</h3>
                                <i class="fas fa-arrow-circle-down fa-2x arrow_down"></i>
                                <p class="p_arrow_down">description</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="main-box">
                            <div class="box-img">
                                <img src="{{asset('images/muffins.jpg')}}" alt="" width="100%">
                            </div>
                            <div class="box-text">
                                <h3>Title</h3>
                                <i class="fas fa-arrow-circle-down fa-2x arrow_down"></i>
                                <p class="p_arrow_down">description</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>


        <section id="hero-section" class="mt-5 mb-3">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="main-box main-box-left">
                            <div class="box-title">
                                <h2>Cappucino</h2>
                            </div>
                            <div class="box-p">
                                <p>Made with wholegrain flour, dark chocolate and custom home-made cookies. A piece of
                                    heaven, a true indulgence for the senses.
                                    We bake them every day of the week so stop by for one or two with a fresh cup of
                                    capuccino. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main-box main-box-right">
                            <div class="box-img">
                                <img src="{{asset('images/chocolate-capuccino.jpg')}}" alt="" style="width:100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div id="product-show">
                        <div class="box-title mt-3 mb-5">
                            <h2>Prodotti</h2>
                        </div>
                    </div>
                </div>

                @forelse($sweets as $sweet)
                    @if($sweet->visibility)
                        <div class="col-lg-4 mb-5">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('storage/' . $sweet->cover)}}"
                                     alt="">
                                <div class="card-body">
                                    <h3 class="text-capitalize text-truncate">{{$sweet->name}}</h3>
                                    <p class="card-text text-truncate">{{$sweet->description}}</p>
                                
                                    @if( $sweet->created_at->format('d')  == $data->today()->day  )
                                        <p class="card-text">{{$sweet->price}} 
                                            €</p>
                                    @elseif( $sweet->created_at->format('d') + 1 == $data->today()->day )
                                        <p class="card-text">{{ ((number_format((float)$sweet->price, 1)) / 100) * 80 }}
                                            €</p>
                                    @elseif( $sweet->created_at->format('d') + 2 == $data->today()->day )
                                        <p class="card-text">{{ ((number_format((float)$sweet->price, 1)) / 100) * 20 }}
                                            €</p>
                                    @else
                                        {{$sweet->visibility = false}}
                                    @endif
                                    <a href="{{route('single-products', ['slug' => $sweet->slug])}}"
                                       class="btn btn-primary">Visualizza</a>
                                </div>
                            </div>
                        </div>
                    @endif

                @empty
                    <h2 class="text-center">non ci sono prodotti</h2>
                @endforelse
            </div>
        </div>
    </div>


    @include('layouts.partials.footer')
@endsection
