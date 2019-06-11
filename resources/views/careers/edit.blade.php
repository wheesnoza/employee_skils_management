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
                                <label for="experience" class="col-md-4 col-form-label text-md-right">タイトル</label>
                                <div class="col-md-8">
                                    <input id="experience" name="experience" type="text" class="form-control col-md-8 @error('experience') is-invalid @enderror" placeholder="学校やプロジェクトの名前" value="{{ old('experience', $career->experience) }}">
                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">詳細内容</label>
                                <div class="col-md-8">
                                    <textarea class="form-control col-md-8" name="details" rows="3">{{ old('details', $career->details) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">年から年まで</label>
                                <div class="col-md-3">
                                    <input id="start_year" name="start_year" type="number" class="form-control col-md-8 @error('start_year') is-invalid @enderror" placeholder="2018" value="{{ old('start_year', $career->start_year) }}">
                                    @error('start_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <input id="end_year" name="end_year" type="number" class="form-control col-md-8 @error('end_year') is-invalid @enderror" placeholder="2019" value="{{ old('end_year', $career->end_year) }}">
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
                                        更新する
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
