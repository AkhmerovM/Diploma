            <div class="col-md-2">
                <h3>Рекомендации</h3>
                @forelse ($posts as $post)
                    <div class="panel panel-default">

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

