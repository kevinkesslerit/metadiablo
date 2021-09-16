@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
					Replying to <strong>{{ $threadTitle }}</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('forumPostsStore', ['categorySlug' => $categorySlug, 'threadSlug' => $threadSlug]) }}">
                    @csrf
                        <div class="form-group row">
                            <div class="col-lg-8 offset-md-2 input-group">
                                    <textarea 
                                    class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"
                                    id="bodytextarea" 
                                    rows="3" 
                                    name="body"
                                    placeholder="Post Body"></textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 offset-md-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
