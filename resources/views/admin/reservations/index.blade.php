@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestion des Réservations</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="reservationsTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Nom / Structure</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">Détails</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td class="text-center">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $reservation->type == 'ticket' ? 'bg-info' : 'bg-warning' }}">
                                                {{ ucfirst($reservation->type) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{ $reservation->name }}
                                            @if($reservation->company)
                                                <br><small class="text-muted">{{ $reservation->company }}</small>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="mailto:{{ $reservation->email }}">{{ $reservation->email }}</a><br>
                                            {{ $reservation->phone }}
                                        </td>
                                        <td class="text-center">
                                            @if($reservation->type == 'ticket')
                                                Qté: {{ $reservation->quantity }}<br>
                                            @else
                                                Type: {{ ucfirst($reservation->stand_type) }}<br>
                                            @endif
                                            @if($reservation->message)
                                                <button type="button" class="btn btn-sm btn-link p-0" data-bs-toggle="popover"
                                                    title="Message" data-bs-content="{{ $reservation->message }}">Voir
                                                    message</button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($reservation->status == 'pending')
                                                <span class="badge bg-secondary">En attente</span>
                                            @elseif($reservation->status == 'accepted')
                                                <span class="badge bg-success">Accepté</span>
                                            @else
                                                <span class="badge bg-danger">Refusé</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($reservation->status == 'pending')
                                                <form action="{{ route('admin.reservations.status', $reservation->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Accepter cette réservation ? un email sera envoyé.');">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="accepted">
                                                    <button type="submit" class="btn btn-success btn-sm" title="Accepter">
                                                        <i class="bi bi-check-lg"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.reservations.status', $reservation->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Refuser cette réservation ? un email sera envoyé.');">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Refuser">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Supprimer définitivement ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-secondary btn-sm" title="Supprimer">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
@endsection