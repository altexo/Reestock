@component('mail::message')
# ReeStock de sus proximos productos

Tienes listas proximas a surtir. Recuerda que tienes 24h para realizar cambios antes que tu pedidos se cierre.



@component('mail::button', ['url' => $url])
Ir a mis listas
@endcomponent


@endcomponent