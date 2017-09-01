                <nav id="sidebar" class="col-xs-9 col-md-2 sidebar-offcanvas">
                    <button class="btn btn-toggle visible-xs visible-sm"><i class="fa fa-bars"></i></button>
                    <aside class="sidebar-module">
                        <h4><i class="fa fa-archive"></i> Archiwum</h4>
                        <ol class="list-unstyled">
                        @foreach($archiveList as $archive)
                        <li><a href="{{route('archive', [$archive->year,$archive->month])}}">{{$archive->month_name}}&nbsp;{{$archive->year }}</a></li>
                        @endforeach
                            

                        </ol>
                    </aside>
                    <aside id="tags" >
                        <h4><i class="fa fa-tags"></i>Tagi</h4>
                        @foreach($tagList as $tag)
                        <a href="{{route('tag',$tag->name)}}" style="font-size: {{tagSize($tag->post->count())}}em">#{{$tag->name}}</a>
                        @endforeach
                    </aside>  
                </nav>
