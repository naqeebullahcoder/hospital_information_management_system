@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Create News
        </div>

        <div class="card-body">
            <form action="{{ route("admin.news.update",[$news]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">News Title*</label>
                    <input type="text" id="title" name="title" class="form-control" required value="{{ old('title', isset($news) ? $news->title : '') }}">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">News Details*</label>
                    <textarea type="text" rows="1" id="description" name="description" class="form-control" required >{{ old('description',$news->description) }}</textarea>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                    <label for="picture">Picture</label>
                    <input type="file" rows="2" id="picture" name="picture" class="form-control" value="{{ old('picture', ('public/uploads/news'.$news->picture)) }}">
                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('picture') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('news_link') ? 'has-error' : '' }}">
                    <label for="news_link"> News link</label>
                    <input type="text" rows="2" id="news_link" name="news_link" class="form-control"  value="{{ old('news_link', isset($news) ? $news->news_link : '') }}">
                    @if($errors->has('news_link'))
                        <em class="invalid-feedback">
                            {{ $errors->first('news_link') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="title">News Date*</label>
                    <input type="date" id="date" name="date" class="form-control" required value="{{ old('date', date('Y-m-d', strtotime($news->date))) }}">
                    @if($errors->has('date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">Active Status*</label>

                    <select name="status" id="status" class="form-control select2">
                        @foreach($status as $active_status)
                            <option value="{{$active_status->id}}" {{ old('status', $news->status) == $active_status->id ? 'selected' : '' }}>
                                {{$active_status->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_category_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection