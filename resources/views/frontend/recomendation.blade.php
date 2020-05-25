            <div class="col-md-2">
                <h3>Рекомендации</h3>
                @forelse ($recomendationPosts as $post)
                    <div class="panel panel-default tac">
                        <a href="/posts/{{$post->id}}">
                            {{ $post->title }}
                        </a>
                        <div>
                            <small>by {{ $post->user->name }}</small>
                            </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Not Found!!</div>

                        <div class="panel-body">
                            <p>Sorry! No post found.</p>
                        </div>
                    </div>
                @endforelse

            </div>

