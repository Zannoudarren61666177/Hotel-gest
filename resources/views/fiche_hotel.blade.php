{{-- 
Variables attendues :
$hotel (objet Hôtel, relations : rooms, services, reviews)
--}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $hotel->nom }} - {{ __('Fiche hôtel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { margin:0; background:#f5f7fa; font-family:'Segoe UI',Arial,sans-serif; color:#222;}
        .hotel-container { max-width:1100px; margin:32px auto 24px auto; background:#fff; border-radius:16px; box-shadow:0 4px 32px #00358011; overflow:hidden;}
        .hotel-gallery { display:flex; gap:10px; padding:18px 20px 0 20px; background:#f6fafd;}
        .hotel-gallery img { width:160px; height:110px; object-fit:cover; border-radius:8px; box-shadow:0 1px 8px #00358014;}
        .hotel-header { padding:16px 34px 0 34px;}
        .hotel-name { font-size:1.7rem; color:#003580; font-weight:700; margin-bottom:6px;}
        .hotel-address { color:#0071c2; margin-bottom:8px; font-size:1.04rem;}
        .hotel-desc { color:#444; font-size:1.07rem; margin-bottom:12px;}
        .hotel-contact { color:#333; font-size:0.98rem; margin-bottom:15px;}
        .hotel-main { display:flex; gap:36px; flex-wrap:wrap; padding:0 34px 24px 34px;}
        .hotel-rooms { flex:2 1 380px;}
        .rooms-list { margin-top:4px;}
        .room-card { background:#f5f8fc; border-radius:11px; padding:14px 18px; margin-bottom:13px; box-shadow:0 1px 6px #00358011;}
        .room-title { color:#003580; font-weight:600; }
        .room-meta { color:#444; font-size:0.97rem; margin-bottom:7px;}
        .room-eq { color:#0071c2; font-size:0.98rem;}
        .room-prix { color:#febb02; font-weight:bold; margin-top:5px;}
        .room-reserve { background:linear-gradient(90deg, #003580, #0071c2); color:#fff; border:none; border-radius:7px; padding:8px 17px; font-weight:600; font-size:1.01rem; cursor:pointer; margin-top:7px;}
        .room-reserve:hover { background:linear-gradient(90deg, #febb02, #0071c2); color:#003580;}
        .hotel-services { flex:1 1 220px; background:#f9fafc; border-radius:10px; padding:17px 16px; margin-top:12px;}
        .services-title { color:#0071c2; font-weight:600; margin-bottom:8px;}
        .service-item { color:#333; margin-bottom:7px; font-size:0.99rem; }
        .hotel-reviews { margin-top:18px; }
        .reviews-title { color:#003580; font-weight:600; margin-bottom:7px;}
        .review-item { background:#f6fafd; border-radius:7px; padding:10px 14px; margin-bottom:7px;}
        .review-author { color:#0071c2; font-weight:500;}
        .review-note { color:#febb02; font-weight:bold; margin-left:8px;}
        @media (max-width:900px){ .hotel-main{flex-direction:column;gap:12px;} .hotel-rooms, .hotel-services{max-width:100%;} }
        @media (max-width:600px){ .hotel-container{border-radius:0;box-shadow:none;} .hotel-header, .hotel-main{padding: 0 2vw;} .hotel-gallery{padding:8px 2vw 0 2vw;} }
    </style>
</head>
<body>
<div class="hotel-container">
    <div class="hotel-gallery">
        @foreach($hotel->images as $img)
            <img src="{{ asset('storage/hotels/'.$img) }}" alt="Photo hôtel">
        @endforeach
    </div>
    <div class="hotel-header">
        <div class="hotel-name">{{ $hotel->nom }}</div>
        <div class="hotel-address">{{ $hotel->adresse }}</div>
        <div class="hotel-desc">{{ $hotel->description }}</div>
        <div class="hotel-contact">
            <span>{{ __('Téléphone') }} : {{ $hotel->telephone }}</span> | 
            <span>{{ __('Email') }} : {{ $hotel->email }}</span>
        </div>
    </div>
    <div class="hotel-main">
        <div class="hotel-rooms">
            <h3>{{ __('Chambres disponibles') }}</h3>
            <div class="rooms-list">
                @foreach($hotel->rooms as $room)
                    <div class="room-card">
                        <div class="room-title">{{ $room->type }}</div>
                        <div class="room-meta">{{ $room->capacity }} pers. | {{ $room->prix }} € / {{ __('nuit') }}</div>
                        <div class="room-eq">
                            @foreach($room->equipments as $eq)
                                {{ $eq }}@if(!$loop->last), @endif
                            @endforeach
                        </div>
                        <div class="room-prix">{{ __('À partir de') }} {{ $room->prix }} €</div>
                        <form action="{{ route('reservation.paiement', ['room' => $room->id]) }}" method="GET" style="margin-top:7px;">
                            @csrf
                            <label style="font-size:0.95em">{{ __('Arrivée') }}</label>
                            <input type="date" name="date_debut" required min="{{ date('Y-m-d') }}" style="margin-right:7px;">
                            <label style="font-size:0.95em">{{ __('Départ') }}</label>
                            <input type="date" name="date_fin" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            <button type="submit" class="room-reserve">{{ __('Réserver') }}</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="hotel-services">
            <div class="services-title">{{ __('Services de l\'hôtel') }}</div>
            @forelse($hotel->services as $srv)
                <div class="service-item">• {{ $srv->nom }} ({{ number_format($srv->prix,2) }} €)</div>
            @empty
                <div class="service-item">{{ __('Aucun service répertorié.') }}</div>
            @endforelse
        </div>
    </div>
    <div class="hotel-reviews">
        <div class="reviews-title">{{ __('Avis clients') }}</div>
        @forelse($hotel->reviews as $rev)
            <div class="review-item">
                <span class="review-author">{{ $rev->user->nom }}</span>
                <span class="review-note">&#9733; {{ number_format($rev->note,1) }}</span><br>
                <span>{{ $rev->commentaire }}</span>
            </div>
        @empty
            <div class="review-item">{{ __('Aucun avis pour cet hôtel.') }}</div>
        @endforelse
    </div>
</div>
</body>
</html>