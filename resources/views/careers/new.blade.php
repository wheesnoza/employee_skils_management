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
                                <div class="col-md-12">
                                    <label for="experience" class="col-md-4 col-form-label text-md-right">タイトル</label>
                                    <input id="experience" name="experience" type="text" class="form-control" placeholder="学校やプロジェクトの名前">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input id="start_year" name="start_year" type="text" class="form-control @error('start_year') is-invalid @enderror">
                                    @error('start_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input id="start_month" name="start_month" type="text" class="form-control @error('start_month') is-invalid @enderror">
                                    @error('start_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <input id="end_year" name="end_year" type="text" class="form-control @error('end_year') is-invalid @enderror">
                                    @error('end_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input id="end_month" name="end_month" type="text" class="form-control @error('end_month') is-invalid @enderror">
                                    @error('end_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">詳細内容</label>

                                <div class="col-md-12">
                                    <input id="details" type="textarea" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}">

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
