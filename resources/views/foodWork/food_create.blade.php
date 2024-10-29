@extends('adminPage.layouts.main')

@section('title', 'Create')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>{{ $error }}</strong><br>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="/food_store" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name:" id="name">
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                    <br><br>

                    @foreach ($massalliqlar as $massalliq)
                        <input type="checkbox" name="ids[]" value="{{ $massalliq->id }}" id="massalliq{{ $massalliq->id }}">
                        <label for="massalliq{{ $massalliq->id }}">{{ $massalliq->name }}</label><br>
                    @endforeach
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
