
            @if(isset($errors) && $errors->any())
                <div class=" alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="m-0 pl-1" style="list-style:none">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
