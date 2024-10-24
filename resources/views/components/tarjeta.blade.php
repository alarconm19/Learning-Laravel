<div class="card">
    @if(isset($card_header))
        <div class="card-header">
            {{ $card_header }}
        </div>
    @endif

    <div class="card-body">
        {{ $slot ?? 'Este es el mensaje por default' }}
    </div>

    @if(isset($card_footer))
        <div class="card-footer">
            {{ $card_footer }}
        </div>
    @endif
</div>
