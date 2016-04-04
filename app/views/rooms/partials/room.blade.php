<article>
    <div class="images">
        @if($room->present()->getCount() == 1)
            {{$room->present()->getImage()}}
        @else

            <div id="carousel-{{$room->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < $room->present()->getCount(); $i++)
                        <li data-target="#carousel-{{$room->id}}" data-slide-to="{{$i}}"></li>
                    @endfor
                </ol>

                <!-- Wrapper for slides -->
                {{$room->present()->getImage()}}

                <a class="left carousel-control" href="#carousel-{{$room->id}}" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-{{$room->id}}" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        @endif
    </div>
    <div class="info-background">
        @if( $room->present()->isLike($room->id,Auth::id()) == 0 )
            {{ Form::open(array('route' => ['like_path',$room->id],'method' => 'post','id' => 'form-like')) }}
            {{ Form::hidden('room_id',$room->id) }}
            {{ Form::hidden('pic_owner_id',$room->user_id) }}
            <a style="cursor: pointer;" id="like" class="text-muted like-button"
               onclick="$(this).closest('form').submit()">like</a>
            {{ Form::close() }}
            {{ Form::open(array('route' => ['unlike_path',$room->id],'method' => 'post','id' => 'form-unlike')) }}
            {{ Form::hidden('room_id',$room->id,array('id' => 'room_id')) }}
            <a style="cursor: pointer;display: none" id="unlike" class="text-muted like-button unlike"
               onclick="$(this).closest('form').submit()">unlike</a>
            {{ Form::close() }}
        @else
            {{ Form::open(array('route' => ['like_path',$room->id],'method' => 'post','id' => 'form-like')) }}
            {{ Form::hidden('room_id',$room->id) }}
            {{ Form::hidden('pic_owner_id',$room->user_id) }}
            <a style="cursor: pointer;display: none" id="like" class="text-muted like-button"
               onclick="$(this).closest('form').submit()">like</a>
            {{ Form::close() }}
            {{ Form::open(array('route' => ['unlike_path',$room->id],'method' => 'post','id' => 'form-unlike')) }}
            {{ Form::hidden('room_id',$room->id,array('id' => 'room_id')) }}
            <a style="cursor: pointer;" id="unlike" class="text-muted like-button unlike"
               onclick="$(this).closest('form').submit()">unlike</a>
            {{ Form::close() }}
        @endif
        <p class="text-muted likers-list">{{  $room->present()->getLikersList() }}</p>
        <a href="#" class="text-muted share-button">share</a>
    </div>
    @if($room->present()->hasComment($room->id) == 1)
        <div class="photo-comment-background text-left">
            @include('rooms.partials.photo-comment')
        </div>
    @endif
    @unless($room->comments->isEmpty())
        <div class="text-left ccc">
            @foreach($room->comments as $comment)
                @include('rooms.partials.comment')
            @endforeach
        </div>
    @endunless
    <div class="show-more-comment">
        <a class="show-more text-muted" style="cursor: pointer;">show more<span
                    class="glyphicon glyphicon-arrow-down"></span></a>
    </div>
    @if($signedIn)
        <div class="post_comment">
            {{ Form::open(['route' => ['comment_path',$room->id], 'class' => 'comment-create-form']) }}
            {{ Form::hidden('room_id',$room->id) }}
            <div class="pull-left">
                @include('users.partials.avatar',['user' => $currentUser, 'class' => 'media-object'])
            </div>
            <div class="form-group">
                {{ Form::textarea('body', null, ['class' => 'form-control','rows'=>1,'placeholder' => "Write a comment..."]) }}
            </div>
            {{ Form::close() }}
        </div>
    @endif

</article>


