@extends('blog.master')

@push('stylesheet')
    <link href="{{asset('css/lightbox.css')}}" rel="stylesheet"></script>
    
@endpush

@section('content')
<article class="container-fluid col-xs-12">
                    <header class="text-center lead page-header"> 
                        <h1>{{$album->title}}</h1> 
                    </header>    
    
    @foreach($album->photos as $photo)
                <figure class="col-sx-12 col-md-3 ">
                                       
                    <div class="thumbnail-img polaroid"><a href="#{{$photo->id}}"><img class="center-block img-responsive" src="{{thumbnail($photo->media_id)}}" alt=""></a></div>
                    
                </figure>
    @endforeach
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal Lightbox-->
<div class="modal fade lightbox" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-width" role="document">
    <div class="modal-content">
          <div class="row is-flex">
             
              <div class="col-lg-9 col-md-8 col-xs-12">
                 <div class="img-wrapper" fullsceenEnable>
                     
                      <img src="https://images.pexels.com/photos/445109/pexels-photo-445109.jpeg">
                  </div>
                  <div class="wrapper-overlay"><a href="#" class="close expand" title="Uruchom tryb pełnoekranowy" aria-label="Fullscreen" data-role="fullscreen"><i class="fa fa-expand"></i></a></div>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-12 padding-clear">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <article class="caption">
                      <header class="container-fluid">
                          <figure class="picture-profile"><img class="img-responsive img-circle hidden" src="http://aspirehire-co-uk.mysmarterwebsite.co.uk/aspirehire-co-uk/_img/profile.svg" alt="Zdjęcie profilowe"/></figure>
                          <h1 class="lead">Ala ma kota a kot ma alę</h1>
                          <h2 class="small"><span class="subtitle ">Natalia</span><span>&nbsp;<data>23 minuty</data></span></h2>
                      </header>
                      <section>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, laoreet eu sem at, semper accumsan turpis. Vivamus mauris velit, luctus et mi vitae, auctor ornare enim. Phasellus suscipit magna ut libero dictum iaculis. Mauris eu felis vel sapien ornare tempus. Pellentesque orci aliquam. </p>
                          <div class="list-icon" data-label="exif info">
                              <div class="theIcon"><i class="fa fa-camera"></i></div>
                              <div class="theInfo">
                                  <h3 class="title text-uppercase">NIKON D5200</h3>  
                                <span>50.0 mm</span>
                                <span>f/1.8</span>
                                <span>1/160 s</span>
                                <span>ISO 200</span>

                              </div>
                          </div>
                          <div class="comment-list">
                              <div class="comment-item">
                                  <button class="close" aria-label="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                  <span class="bold" data-label="user_name">Kowalski</span>
                                  <span data-label="comment_content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, laoreet eu sem at, semper accumsan turpis.</span> 
                              </div>
                              <div class="comment-item">
                                  <button class="close" aria-label="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                  <span class="bold" data-label="user_name">Kowalski</span>
                                  <span data-label="comment_content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, laoreet eu sem at, semper accumsan turpis.</span> 
                              </div>
                              <div class="comment-item">
                                  <button class="close" aria-label="Delete" title="Usuń komentarz" data-toggle="tooltip"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                  <span class="bold" data-label="user_name">Kowalski</span>
                                  <span data-label="comment_content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, laoreet eu sem at, semper accumsan turpis.</span> 
                              </div>                              
                          </div>    
                      </section>
                      <footer>
                          <section class="comment-form">
                              <form>
                                  <textarea class="inline-input" placeholder="Dodaj komentarz..."></textarea>
                              </form>
                          </section>
                      </footer>
                  </article> 
              </div>              
          </div>

    </div>
      <div class="lightbox-control left hidden-xs"><a href="#" role="button"><i class="fa fa-chevron-left"></i> </a></div>  
      <div class="lightbox-control right hidden-xs"><a href="#" role="button"><i class="fa fa-chevron-right"></i></a></div>       
  </div>
 
</div> 
@push('script')
<script src="{{asset('js/jquery.fullscreen.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.lightbox.js')}}" type="text/javascript"></script>
@endpush

@endsection
