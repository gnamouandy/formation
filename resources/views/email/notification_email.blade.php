@component('mail::message')
# Nophptification

Vous avez recu un message

## Désignation: {{$produit->designation}}
## Prix: {{$produit->prix}}
## Description: 
{{$produit->description}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
