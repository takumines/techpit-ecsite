@extends('layouts.app_supplier')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    商品追加画面
                </div>
                <div class="card-body">
                    <form action="/supplier/item/add" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="amount">金額</label><br>
                            <input type="text" class="form-control-sm" name="amount" value="{{ old('amount') }}">円
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">追加</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection