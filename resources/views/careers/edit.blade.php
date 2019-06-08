@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">経歴</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('career.update', $career) }}">
                            {{ method_field('PUT') }}
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="experience" class="col-md-4 col-form-label text-md-right">タイトル</label>
                                    <input id="experience" name="experience" type="text" class="form-control" placeholder="学校やプロジェクトの名前" value="{{ old('experience', $career->experience) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    {{Form::selectRange('start_year', 1970, 2018, '', ['class' => 'form-control','placeholder' => '年'])}}
                                    @error('start_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    {{Form::selectRange('end_year', 1970, 2018, '', ['class' => 'form-control','placeholder' => '年'])}}
                                    @error('end_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">詳細内容</label>

                                <div class="col-md-12">
                                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" rows="3">{{ old('details', $career->details) }}</textarea>

                                    @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        更新
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
