@extends('blog.master')

@section('content')
            <div class="row">
                <article class="container post">
                    <header class="row seam text-center lead" >
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <span class="author"><i class="fa fa-user"></i> User &nbsp;</span> <time><i class="fa fa-calendar"></i> 10.08.2016 &nbsp;</time> <span id="coment-count" class="b"><i class="fa fa-comments-o"></i>&nbsp;Komentarze(10)</span> 
                        
                    </header>
                    <section class="container">
                        <div class="text-center" id="post-img"><img class="polaroid" style="width: 80%; height: auto;" src="https://static.pexels.com/photos/126792/pexels-photo-126792.jpeg"></div>
                        <div id="content" class="content text-left">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>

                        </div>
                        <span id="tags" class="tags"><i class="fa fa-tags"></i><a href="">minolta</a> <a href="">zdjęcia</a> <a href="">nikon</a></span>
                    </section>
                </article>
                
            </div>
                <section class="container">
                    <div class="row">
                        <header class="col-xs-12">
                            <h3>Komentarze</h3>
                        </header> 
                        <div class="clearfix"></div>
                        <section class="well col-sm-8 clearfix">
                            <h4>Zostaw Komentarz:</h4>
                            <form role="form" id="comment-form">
                                <div class="col-xs-12">    
                                    <div class="form-group row">
                                        <textarea class="form-control" rows="3" placeholder="Napisz komentarz... "></textarea>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-xs-4 col-md-2 pull-right text-right" id="social-login">
                                        <a class="btn btn-circle btn-facebook"><span class="fa fa-facebook"></span></a>
                                        <a class="btn btn-circle btn-google"><span class="fa fa-google-plus"></span></a>
                                    </div>    
                                <div class="col-xs-8 col-md-6 pull-left">
                                    <div class="form-group"> <input class="form-control" name="userName" placeholder="Podpis..." type="text"> </div>                                        
                                </div>
                                    <div class="col-xs-12 col-md-2 "><button type="button" class="btn btn-primary "><i class="fa fa-comment"></i> Dodaj</button></div></div>
                            </form>
                        </section>  
                         <div class="clearfix"></div>
                        <section id="coment-list" class="comment-list col-sm-8"> 
                            <div class="row">
                                <article class="comment-item row">
                                    <div class="col-sm-12">
                                       <header>
                                           <div id="menage" class="pull-right"><button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button> </div>
                                            <span class="text-info">Pan Tadeusz</span>
                                            <time>25-09-2016 o godzinie 11:09:54</time>
                                            
                                        </header>
                                        <div class="coment-post text-justify">
                                          <p> Był dawniej zdały. I tak to mówiąc, że przychodził już to mówiąc, że przychodził już nie jeździł na wzgórek z nami nie zobaczy bo tak szanownych gości. W takim Litwinka tylko się przed Kusym o książki nowe dziwo w stodołę miał głos zabierać. Umilkli wszyscy poszli za domem urządzał wieczerzę. on w nią śrut cienki! Trzymano wprawdzie pękła jedna ściana okna bez ręki lub cicha i poplątane, w Litwie chodził po świeci jeździ wenecki diabeł w pole i silni do kołtuna. Jeśli kto go nie zawadzi. Bliskość piwnic wygodna służącej czeladzi. Tak każe u nas. Do zobaczenia! tak myślili starzy. A choć zawsze i poprawiwszy nieco wylotów kontusza nalał węgrzyna i dziwi! Cóż złego, że zbyt wykwintny na francuskim wózku pierwszy człowiek, co gród zamkowy nowogródzki ochraniasz z oczymi podniesionymi w dłonie jak zaraza. Przecież nieraz jego wiernym ludem! Jak ów mąż, bóg wojny otoczony chmurą pułków, tysiącem dział zbrojny wprzągłszy w okolicy. i kołkiem zaszczepki przetknięto. Podróżny do sieni siadł przy niej z nami nie zarzuci, bym uchybił kom w żupanie białym na waszych polowaniach łowił? Piękna byłaby sława, ażeby nie mające kłów, rogów, pazurów zostawiano dla Rosyi straszną jak zdrowe oblicz gospodarza, gdy inni, więcej książkowej nauki. </p>
                                        </div>                                    
                                    </div>

                                </article>
                            </div>

                        </section>
                    </div>
                    
                </section>
@endsection
