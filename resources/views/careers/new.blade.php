@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">経歴</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('career.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="experience" class="col-md-4 col-form-label text-md-right">タイトル</label>
                                <div class="col-md-8">
                                    <input id="experience" name="experience" type="text" class="form-control col-md-8 @error('experience') is-invalid @enderror" placeholder="学校やプロジェクトの名前">
                                    @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="details" class="col-md-4 col-form-label text-md-right">詳細内容</label>

                                <div class="col-md-8">
                                    <textarea class="form-control col-md-8" name="details" rows="3">{{ old('details') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="experience" class="col-md-4 col-form-label text-md-right">年から年まで</label>
                                <div class="col-md-2">
                                    {{Form::selectRange('start_year', 1970, 2018, '', ['class' => 'form-control','placeholder' => '年'])}}
                                    @error('start_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{Form::selectRange('end_year', 1970, 2018, '', ['class' => 'form-control','placeholder' => '年'])}}
                                    @error('end_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        追加
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
