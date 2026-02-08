@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier la Vision & Mission</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.festival.vision.update', $vision->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h5 class="text-primary mt-3">Vision</h5>
                        <div class="mb-3">
                            <label>Titre Vision</label>
                            <input type="text" name="vision_title" class="form-control" value="{{ $vision->vision_title }}">
                        </div>
                        <div class="mb-3">
                            <label>Texte Vision</label>
                            <textarea name="vision_text" class="form-control" rows="5">{{ $vision->vision_text }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Image Vision</label>
                            @if($vision->vision_image)
                                <br><img src="{{ asset($vision->vision_image) }}" width="150" class="img-thumbnail">
                            @endif
                            <input type="file" name="vision_image" class="form-control mt-2">
                        </div>

                        <hr>

                        <h5 class="text-success mt-3">Mission</h5>
                        <div class="mb-3">
                            <label>Titre Mission</label>
                            <input type="text" name="mission_title" class="form-control"
                                value="{{ $vision->mission_title }}">
                        </div>
                        <div class="mb-3">
                            <label>Texte Mission</label>
                            <textarea name="mission_text" class="form-control"
                                rows="3">{{ $vision->mission_text }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Points Clés de la Mission</label>
                            <div id="mission-points">
                                @if($vision->mission_points)
                                    @foreach($vision->mission_points as $point)
                                        <div class="input-group mb-2">
                                            <input type="text" name="mission_points[]" class="form-control" value="{{ $point }}">
                                            <button type="button" class="btn btn-danger remove-point">X</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-success" id="add-point">+ Ajouter un
                                point</button>
                        </div>

                        <div class="mb-3">
                            <label>Image Mission</label>
                            @if($vision->mission_image)
                                <br><img src="{{ asset($vision->mission_image) }}" width="150" class="img-thumbnail">
                            @endif
                            <input type="file" name="mission_image" class="form-control mt-2">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-point').addEventListener('click', function () {
            var container = document.getElementById('mission-points');
            var div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" name="mission_points[]" class="form-control">
                <button type="button" class="btn btn-danger remove-point">X</button>
            `;
            container.appendChild(div);
        });

        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-point')) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endsection