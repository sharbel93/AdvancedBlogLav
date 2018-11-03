@extends('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Add New Blog Post</h1>
            </div>
            <div class="column">
                {{--<a href="{{route('posts.create')}}" class="button is-primary is-pulled-right">--}}
                    {{--<i class="fa fa-user-add m-r-10"></i> Create New User--}}
                {{--</a>--}}
            </div>
        </div>
        <hr>

        <form action="{{route('posts.store')}}" method="post">
            {{ csrf_field()}}
            <div class="columns">
                <div class="column is-three-quarters-desktop">
                    <b-field>
                        <b-input  type="text" placeholder="Post Title" size="is-large" v-model="title"></b-input>
                    </b-field>

                   <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title"
                                @slug-changed="updateSlug"></slug-widget>
                    <input type="hidden " v-model="slug" name="slug">
                    {{--<b-field>--}}
                    {{--<b-input  type="textarea" placeholder="Compose your masterpiece ..." rows="10"></b-input>--}}
                    {{--</b-field>--}}
                    <b-field class="m-t-40">
                        <b-input type="textarea" rows="20"
                                 {{--minlength="10"--}}
                                 {{--maxlength="500"--}}
                                 placeholder="Compose your masterpiece ...">
                        </b-input>
                    </b-field>
                </div> <!-- end of .column.is-three-quarters -->
  
                <div class="column is-one-quarter-desktop is-narrow-tablet">
                    <div class="card card-widget">
                            <div class="author-widget widget-area">
                             <div class="selected-author">
                                 <img src="https://placehold.it/50x50" alt="image">
                                <div class="author">
                                    <h4>By: Sharbel Chris</h4>
                                    <p class="subtitle">
                                        (shaan)
                                    </p>
                                </div>
                             </div>
                            </div>
                            
                            <div class="post-status-widget widget-area">
                                <div class="status">
                                <div class="status-icon">
                                    {{--<b-icon  icon="clipboard" size="medium"></b-icon>--}}
                                    <i class="fas fa-clipboard-list fa-2x"></i>
                                </div>
                                <div class="status-details">
                                    <h4>Draft</h4>
                                    <p>A Few Minutes Ago </p>
                                </div>

                                </div>

                            </div>

                            <div class="publish-buttons-widget widget-area">
                               <div class="secondary-action-button">
                                   <button class="button is-info is-outlined is-fullwidth">Save Draft</button>

                               </div>
                                <div class="primary-action-button">
                                    <button class="button is-primary is-fullwidth">Publish</button>

                                </div>
                               </div>
                    </div>
                </div><!-- end of .column.is-one-quarters -->
                
                
            </div>
        </form>

    </div> <!-- end of .container -->
@endsection

@section('scripts')
    <script>
  var app = new Vue({
      el: '#app',
      data: {
          title: '',
          slug: ''
      },
      methods: {
          updateSlug: function(val) {
              this.slug = val;
          }
      }
  });
    </script>
@endsection