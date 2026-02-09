@extends('admin.layouts.template')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-capitalize ps-3 text-black">Paramètres Généraux</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success text-white" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            @foreach($settings as $setting)
                                <div class="mb-3">
                                    <label for="{{ $setting->key }}"
                                        class="form-label text-uppercase text-xs font-weight-bolder">{{ $setting->label ?? $setting->key }}</label>
                                    @if($setting->type === 'textarea')
                                        <textarea class="form-control border px-2" id="{{ $setting->key }}"
                                            name="{{ $setting->key }}" rows="3">{{ $setting->value }}</textarea>
                                    @else
                                        <input type="{{ $setting->type }}" class="form-control border px-2" id="{{ $setting->key }}"
                                            name="{{ $setting->key }}" value="{{ $setting->value }}">
                                    @endif
                                </div>
                            @endforeach

                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark mb-0">Enregistrer les
                                    modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection